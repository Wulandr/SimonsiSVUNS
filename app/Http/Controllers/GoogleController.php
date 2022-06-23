<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

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
            $findemail = User::where('email', $user->email)->first();
            // 
            // jika user sudah pernah login maka langsung redirect ke halaman selanjutnya
            // dd($user->email);
            // dd($user->email);
            $cekAdaEmail = DB::table('users')->where('email', $user->email)->first();
            dd(!empty($cekAdaEmail));
            if ($finduser) {
                Auth::login($finduser);
                if (!empty($cekAdaEmail) == 'true') {
                    return redirect('/tidak_aktif'); //hanya contoh
                }
                dd($user);

                // return redirect()->intended('tidak_aktif');
                // return redirect()->route(
                //     'admin.dashboard',
                // );
                // return view(
                //     'tidak_aktif',
                // );
                // dd($user);
            }
            // jika belum maka akan menyimpan data user ke database kembali (login kembali)
            // else {
            //     // dd($user->id);
            //     $newUser = User::create([
            //         'name' => $user->getName(),
            //         // 'username' => $user->getEmail(),
            //         'email' => $user->getEmail(),
            //         'google_id' => $user->getId(),
            //         'password' => bcrypt('12345678')
            //     ]);
            //     Auth::login($finduser);
            //     return redirect('/tidak_aktif');

            //     // return redirect()->intended('home');
            //     // return redirect()->route(
            //     //     'admin.dashboard',
            //     // );
            // }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
