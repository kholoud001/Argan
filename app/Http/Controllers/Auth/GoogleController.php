<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirect(){
//        return Socialite::driver('google')->stateless()->redirect();
        return Socialite::driver('google')->redirect();

    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Failed to retrieve user information from Google.');
        }

        if (!$google_user) {
            return redirect('/')->with('error', 'Failed to retrieve user information from Google.');
        }

        // Check if this user is in our DB
        $user = User::where('google_id', $google_user->getId())->first();

        if (!$user) {
            // Retrieve the role ID for 'user' or create it if it doesn't exist
            $userRole = Role::firstOrCreate(['name' => 'user']);

            // If the user doesn't exist, create a new one with the default role
            $new_user = User::create([
                'name' => $google_user->getName(),
                'email' => $google_user->getEmail(),
                'google_id' => $google_user->getId(),
                'role_id' => $userRole->id,
            ]);

            Auth::login($new_user);
            return redirect('/')->with('success', 'Login successful!');
        } else {
            // If the user exists, log them in
            Auth::login($user);
            return redirect('/')->with('success', 'Login successful!');
        }
    }
}
