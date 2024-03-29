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
    public function login(Request $request){
        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'message'=> 'Invalid email or password'
            ],401);
        }
        $user= $request->user();
        $token= $user->createToken('Access Token');
        $user->access_token = $token->accessToken;
        return response()->json([
            'message' => 'Login successful',
            ' user'=>$user,
        ],200);

    }
}
