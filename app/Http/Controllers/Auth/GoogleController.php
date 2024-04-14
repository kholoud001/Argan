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
    public function redirect()
    {
//        return Socialite::driver('google')->stateless()->redirect();
        return Socialite::driver('google')->redirect();

    }

    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Failed to retrieve user information from Google.');
        }

        if (!$googleUser) {
            return redirect('/')->with('error', 'Failed to retrieve user information from Google.');
        }

        // Check if this user is in our DB
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            $userRole = Role::firstOrCreate(['name' => 'user']);

            $newUser = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'role_id' => $userRole->id,
            ]);

            $token = $newUser->createToken('Access Token Google')->accessToken;

            return redirect('/?token=' . $token);

        } else {
            // If the user exists, log them in
            Auth::login($user);

            $token = $user->createToken('Access Token Google')->accessToken;

            return redirect('/?token=' . $token);
        }
    }
}
