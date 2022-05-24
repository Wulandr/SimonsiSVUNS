<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as Usernya;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Unit;
use App\Models\Tor;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $role->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $unit = Unit::all();
        $tor = Tor::all();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $tw = DB::table('triwulan')->get();
        $tahun = DB::table('tahun')->get();

        $dokMemo = DB::table('dokumen')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $status_keu = DB::table('status_keu')->get();
        $filtertw = 0;

        $userrole = Usernya::join();
        return view(
            "dashboards.users.index",
            [
                'userrole' => $userrole, 'tor' => $tor, 'trx_status_tor' => $trx_status_tor,
                'status' => $status, 'prodi' => $prodi, 'users' => $users, 'roles' => $roles,
                'dokMemo' => $dokMemo, 'trx_status_keu' => $trx_status_keu, 'status_keu' => $status_keu,
                'tw' => $tw, 'filtertw' => $filtertw, 'tahun' => $tahun
            ]
        );
    }
}
