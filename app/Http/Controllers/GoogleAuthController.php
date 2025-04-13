<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
$avatarUrl = str_replace('=s96-c', '=s400-c', $googleUser->getAvatar());

            // Cek apakah user sudah ada di database
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika user belum ada, buat user baru
                $user = User::create([
                    'username' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('google_auth'), // Bisa diubah sesuai kebutuhan
                    'profile_picture' => $avatarUrl
                ]);
        
        } else {
            // Update profile picture setiap kali login
            $user->update([
                'profile_picture' => $avatarUrl
            ]);
        }
            

            // Login user
            Auth::login($user);
            session()->regenerate(); // Regenerasi session agar tidak hilang
            session()->save();
        Log::info('User logged in:', ['user' => auth()->user()]); // Tambahkan log
            return redirect('/dashboard');
 // Ubah ke halaman tujuan setelah login
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login menggunakan Google');
        }
    }
}
