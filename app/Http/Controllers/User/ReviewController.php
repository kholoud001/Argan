<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function submitReview(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_id' => 'required',
            'feedback' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Get the authenticated user
        $user = Auth::guard('api')->user();

        // Create and save the review
        $review = new Review();
        $review->feedback = $request->feedback;
        $review->rating = $request->rating;
        $review->user_id = $user->id;
        $review->product_id = $request->product_id;
        $review->save();

        // Return a JSON response
        return response()->json(['message' => 'Review submitted successfully'], 200);
    }


}
