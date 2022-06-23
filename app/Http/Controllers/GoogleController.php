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
            $user = Socialite::driver('google')->stateless()->user();
            $findemail = User::where('email', $user->email)->first();
            // 
            // jika email user sama dengan di database maka langsung redirect ke halaman selanjutnya
            $cekAdaEmail = DB::table('users')->where('email', $user->email)->first();

            if ($findemail) {
                Auth::login($findemail);
                if (!empty($cekAdaEmail) == 'true') {
                    return redirect('/home'); //hanya contoh
                }
            } else {
                return redirect('/tidak_aktif');;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
