<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{


    public function addToWishlist(Request $request, $productId)
    {
        try {
            // Check if the user is authenticated
            if (!Auth::check()) {
                return response()->json(['success' => false, 'error' => 'User is not authenticated.'], 401);
            }

            $userId = Auth::id();

            // Check if the product is already in the user's wishlist
            $existingWishlistItem = Wishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingWishlistItem) {
                return response()->json(['success' => false, 'message' => 'Product is already in the wishlist.'], 400);
            }

            // Add the product to the wishlist
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);

            return response()->json(['success' => true, 'message' => 'Product added to wishlist successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred while adding the product to the wishlist.'], 500);
        }
    }

}
