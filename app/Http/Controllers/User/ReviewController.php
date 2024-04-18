<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function submitReview(Request $request, $product_id)
    {
        // Validate the request data
        $request->validate([
            'feedback' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $user = Auth::guard('api')->user();

        $review = new Review();
        $review->feedback = $request->feedback;
        $review->rating = $request->rating;
        $review->user_id = $user->id;
        $review->product_id = $product_id;
        $review->save();

        return response()->json(['message' => 'Review submitted successfully'], 200);
    }


}
