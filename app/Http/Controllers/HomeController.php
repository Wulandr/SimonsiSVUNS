<?php

namespace App\Http\Controllers;

use App\Models\SPJ;
use App\Models\Tor;
use App\Models\Unit;
use App\Models\User as Usernya;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $unit = Unit::all();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $tw = DB::table('triwulan')->get();
        $tahun = DB::table('tahun')->get();
        $dokMemo = DB::table('dokumen')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $status_keu = DB::table('status_keu')->get();
        $filtertw = 0;
        $spj = SPJ::all();
        $userrole = Usernya::join();
        $tor = Tor::all();

        // if (auth()->user()->id_unit != 1) {
        //     $tor = Tor::where('id_unit', auth()->user()->id_unit)->orderBy('created_at', 'desc');
        // } else {
        //     $tor = Tor::all();
        // }
        return view(
            "dashboards.users.index",
            [
                'userrole' => $userrole, 'tor' => $tor, 'trx_status_tor' => $trx_status_tor, 'prodi' => $prodi,
                'status' => $status, 'unit' => $unit, 'users' => $users, 'role' => $role,
                'dokMemo' => $dokMemo, 'trx_status_keu' => $trx_status_keu, 'status_keu' => $status_keu,
                'tw' => $tw, 'filtertw' => $filtertw, 'tahun' => $tahun, 'spj' => $spj, 'tabelRole' => $tabelRole
            ]
        );
    }
}
