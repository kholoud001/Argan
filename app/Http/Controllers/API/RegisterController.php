<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show (){
        return view('Auth/register');
    }

    public function store(Request $request) {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|alpha',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Retrieve the default role ("user")
        $defaultRole = Role::where('name', 'user')->first();

        // Create the user with the default role attached
        $user = $defaultRole->users()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Return success response with a message
        return response()->json([
            "message" => "User registered successfully"
        ], 201);

    }}
