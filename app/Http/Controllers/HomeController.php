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
        // dd($user->roles);

        $userrole = Usernya::join();
        return view('dashboards.users.index', ['userrole' => $userrole, 'unit' => $unit, 'tor' => $tor]);
        // return $userrole;
    }
}
