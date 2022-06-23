<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // mengambil id google
            $user = Socialite::driver('google')->user();

            // inisialisasi user
            $finduser = User::where('google_id', $user->getId())->first();

            // jika user sudah pernah login maka langsung redirect ke halaman selanjutnya
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('home');
            }
            // jika belum maka akan menyimpan data user ke database kembali (login kembali)
            else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'username' => $user->getEmail(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt('12345678')
                ]);
                Auth::login($finduser);
                return redirect()->intended('home');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
