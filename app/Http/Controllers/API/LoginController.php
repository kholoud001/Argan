<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    public function show (){
        return view('Auth/login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        $user = $request->user();

        $role = $user->role_id;

        // Generate token
        $token = $user->createToken('Access Token')->accessToken;

        // Redirect admin
        if ($role === 1) {
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


    public function check(Request $request)
    {
        if ($request->user()) {
            return response()->json(['authenticated' => true]);
        } else {
            return response()->json(['authenticated' => false]);
        }
    }
}
