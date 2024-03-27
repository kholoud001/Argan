<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        // Retrieve the default role ("user")
        $defaultRole = Role::where('name', 'user')->first();

        // Create the user with the default role attached
        $user = $defaultRole->users()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            "message" => "User registered successfully"
        ], 201);
    }
}
