<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{

    public function logout(Request $request)
    {
        if (Auth::check()) {

            $request->user()->token()->revoke();

            return response()->json(['redirect_url' => route('login'), 'message' => 'Logged out successfully'], 200);
        }

        return response()->json(['message' => 'User is not authenticated'], 401);
    }

}
