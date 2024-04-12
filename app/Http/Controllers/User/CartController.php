<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request, $id)
    {
        try {
            if (!Auth::check()) {
                return response()->json(['success' => false, 'error' => 'User not authenticated.'], 401);
            }
            $quantity = $request->input('quantity', 1);

            $shoppingCart = ShoppingCart::firstOrCreate(['user_id' => Auth::id()]);

            // Check if the product is already in the user's cart
            $existingCartItem = CartItem::where('product_id', $id)
                ->where('shopping_cart_id', $shoppingCart->id)
                ->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                CartItem::create([
                    'shopping_cart_id' => $shoppingCart->id,
                    'product_id' => $id,
                    'quantity' => $quantity,
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Product added to cart successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }


    public function getCartItems()
    {
        try {
            if (!Auth::check()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }

            $user = Auth::user();

            // Retrieve the cart items associated with the user
            $cartItems = $user->cartItems()->with('product')->get();

            if ($cartItems->isEmpty()) {
                return response()->json(['error' => 'Shopping cart is empty.'], 404);
            }

            // Calculate the total price
            $totalPrice = $cartItems->sum(function ($cartItem) {
                return $cartItem->quantity * $cartItem->product->price;
            });

            // Return the cart items and total price
            return response()->json([
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching cart items.'], 500);
        }
    }

    public function viewCart(){

            return view('User.cart');
        }

    public function removeCartItem($id)
    {
        try {
            // Find the cart item
            $cartItem = CartItem::findOrFail($id);

            // Check if the authenticated user owns the shopping cart associated with the cart item
            if (Auth::id() !== $cartItem->cart->user_id) {
                return response()->json(['error' => 'Unauthorized action.'], 403);
            }

            // Delete the cart item
            $cartItem->delete();

            return response()->json(['message' => 'Cart item removed successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while removing the cart item.'], 500);
        }
    }
}
