<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

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
            return redirect()->intended('/home');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['login' => 'Gagal login dengan Google.']);
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

            $request->session()->regenerate();

            if ($user->level === 0) {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/home');
        }

        return redirect()->back()->withInput()->withErrors([
            'login' => 'The credentials you provided do not match our records.',
        ]);
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

        return redirect('/home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
