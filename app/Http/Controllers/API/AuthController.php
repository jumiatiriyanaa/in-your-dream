<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToGoogle(Request $request)
    {
        $redirectUrl = $request->query('platform') === 'mobile'
            ? config('services.google.redirect_api')
            : config('services.google.redirect');

        return Socialite::driver('google')
            ->stateless()
            ->redirectUrl($redirectUrl)
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $redirectUrl = $request->query('platform') === 'mobile'
                ? config('services.google.redirect_api')
                : config('services.google.redirect');

            $googleUser = Socialite::driver('google')
                ->stateless()
                ->redirectUrl($redirectUrl)
                ->user();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(uniqid()),
                    'avatar' => $googleUser->getAvatar(),
                    'login_type' => 'google',
                    'level' => 1,
                ]);
            } else {
                $user->update([
                    'avatar' => $googleUser->getAvatar(),
                    'login_type' => 'google',
                ]);
            }

            Auth::login($user);
            return response()->json(['message' => 'Login successful', 'user_id' => $user->id], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to login with Google', 'error' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $credentials = filter_var($request->login, FILTER_VALIDATE_EMAIL) ?
            ['email' => $request->login, 'password' => $request->password] :
            ['phone_number' => $request->login, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->update(['login_type' => 'manual']);

            return response()->json(['message' => 'Login successful', 'user_id' => $user->id], 200);
        }

        return response()->json(['message' => 'The credentials you provided do not match our records.'], 401);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'level' => 1,
            'login_type' => 'manual',
        ]);

        Auth::login($user);

        return response()->json(['message' => 'Registration successful', 'user_id' => $user->id], 201);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
