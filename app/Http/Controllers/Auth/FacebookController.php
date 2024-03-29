<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Failed to retrieve user information from Facebook.');
        }

        if (!$facebook_user) {
            return redirect('/')->with('error', 'Failed to retrieve user information from Facebook.');
        }

        // Check if this user is in our DB
        $user = User::where('facebook_id', $facebook_user->getId())->first();

        if (!$user) {
            // Retrieve the role ID for 'user' or create it if it doesn't exist
            $userRole = Role::firstOrCreate(['name' => 'user']);

            // If the user doesn't exist, create a new one with the default role
            $new_user = User::create([
                'name' => $facebook_user->getName(),
                'email' => $facebook_user->getEmail(),
                'facebook_id' => $facebook_user->getId(),
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
