<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            $cartItem->delete();

            return response()->json(['message' => 'Cart item removed successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while removing the cart item.'], 500);
        }
    }

    public function updateCartItemQuantity(Request $request, $id)
    {
        try {
            // Find the cart item
            $cartItem = CartItem::findOrFail($id);

            if (Auth::id() !== $cartItem->cart->user_id) {
                return response()->json(['error' => 'Unauthorized action.'], 403);
            }

            $validatedData = $request->validate([
                'quantity' => 'required|integer|min:1'
            ]);

            // Update the quantity of the cart item
            $cartItem->update(['quantity' => $validatedData['quantity']]);

            return response()->json(['message' => 'Cart item quantity updated successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the cart item quantity.'], 500);
        }
    }

    public  function checkoutview(){

        return view('User.checkout');

    }



    public function checkout(Request $request)
    {
        try {
            // Validate the request data
                $validatedData = $request->validate([
                    'f_name' => 'required|string',
                    'l_name' => 'required|string',
                    'country' => 'required|string',
                    'street-address' => 'required|string',
                    'pz-code' => 'nullable|string',
                    'phone' => 'nullable|string',
                    'email' => 'required|email',
                    ]);

            // Start a transaction to ensure data consistency
            DB::beginTransaction();

            // Process the checkout

            $userId = auth()->user()->id;

            // Get the user's shopping cart
            $cart = ShoppingCart::where('user_id', $userId)->first();

            // Loop through each cart item
            foreach ($cart->items as $cartItem) {
                // Retrieve the product
                $product = $cartItem->product;

                // Check if the requested quantity is available
                if ($product->quantity < $cartItem->quantity) {
                    throw new \Exception('Insufficient stock for product: ' . $product->name);
                }

                // Decrement the product quantity
                $product->quantity -= $cartItem->quantity;
                $product->save();

                // Create an order item
                $orderItem = new OrderItem([
                    'order_id' => null, // Will be updated after order creation
                    'product_id' => $product->id,
                    'quantity' => $cartItem->quantity,
                    'price' => $product->price,
                ]);
                $orderItem->save();
            }

            // Create an order
            $order = new Order([
                'user_id' => $userId,
                'status' => 'pending',
            ]);
            $order->save();

            // Update order_id in order items
            OrderItem::where('order_id', null)->update(['order_id' => $order->id]);

            $cart->items()->delete();

            DB::commit();

            return response()->json(['message' => 'Checkout successful.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'An error occurred during checkout: ' . $e->getMessage()], 500);
        }
    }

}
