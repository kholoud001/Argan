<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
}
