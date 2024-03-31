<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{

    public function logout(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Revoke the current user's token
            $request->user()->token()->revoke();

            // Return the login route URL in the response
            return response()->json(['redirect_url' => route('login'), 'message' => 'Logged out successfully'], 200);
        }

        return response()->json(['message' => 'User is not authenticated'], 401);
    }

}
