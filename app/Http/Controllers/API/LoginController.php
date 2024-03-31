<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show (){
        return view('Auth/login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        $user = $request->user();

        // Determine user's role
        $role = $user->role_id; // Assuming 'role_id' column holds the role ID of the user

        // Generate token
        $token = $user->createToken('Access Token')->accessToken;

        // Redirect based on user's role
        if ($role === 1) { // Assuming 1 represents the role ID for admin
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'role' => $role,
                'token' => $token,
                'redirect_url_admin' => route('dashboard')
            ]);
        } else {
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'role' => $role,
                'token' => $token,
                'redirect_url_user' => route('home')
            ]);
        }
    }
}
