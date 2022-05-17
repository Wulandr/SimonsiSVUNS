<?php

namespace App\Http\Controllers;

use App\Models\User as Usernya;
use App\Models\Unit;
use App\Models\Tor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class ProdiController extends Controller
{
    public function __construct()
    {
        // $namarole = Usernya::namarole();
        // Usernya::find(2)->assignRole('Prodi');
    }
    function index()
    {
        // $userProdi = User::find(2)->assignRole("Prodi");
        // $role = Auth::user()->role;
        // $role = Role::all();
        // $permission =  Role::all()->where('id', $role);
        // dd($role->permissions);
        // dd(Auth()->user()->roles->pluck('name'));k

        $role = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $role->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $unit = Unit::all();
        $tor = Tor::all();
        // dd($user->roles);

        $userrole = Usernya::join();
        return view('dashboards.users.index', ['userrole' => $userrole, 'unit' => $unit, 'tor' => $tor]);
    }
}
