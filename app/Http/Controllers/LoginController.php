<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak tersedia',
            'password.required' => 'Password tidak tersedia'
        ]);
    
        $user = User::where('username', $request->username)->first();
    
        if (!$user) {
            Log::warning('Login attempt with non-existent username: ' . $request->username);
            return redirect('login')->withErrors(['username' => 'Username tidak tersedia'])->withInput();
        }
    
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            Log::info('User logged in successfully: ' . Auth::user()->username);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            Log::warning('Failed login attempt - incorrect password for username: ' . $request->username);
            return redirect('login')->withErrors(['password' => 'Password salah'])->withInput();
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->id)->first();
            
            if (!$user) {
                $user = User::create([
                    'google_id' => $googleUser->id,
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'avatar' => $googleUser->avatar,
                ]);
            }

            Auth::login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect('login')->withErrors(['google' => 'Gagal login dengan Google']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
