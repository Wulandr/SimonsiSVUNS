<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $table = 'user';
    public function __construct()
    {
        $this->middleware('permission:user_create', ['only' => 'add']);
        $this->middleware('permission:user_delete', ['only' => 'delete']);
        $this->middleware('permission:user_detail', ['only' => 'show']);
        $this->middleware('permission:user_show', ['only' => 'index']);
        $this->middleware('permission:user_update', ['only' => 'update']);
    }
    public function index()
    {
        $user = User::all();
        $unit = Unit::all();
        $role = Role::all();
        $userrole = User::join();
        return view("pengaturan.user.user_index")->with([
            'user' => $user, 'userrole' => $userrole, 'role' => $role,
            'unit' => $unit
        ]);
        // return Auth::user()->getroleNames();
        // return Auth::user()->getAllPermissions();
    }

    public function add()
    {
        $tor = User::all();
        $role = Role::all();
        $userrole = User::join();
        $unit = Unit::all();
        return view("pengaturan.user.user_create")->with(['tor' => $tor, 'userrole' => $userrole, 'role' => $role, 'unit' => $unit]);
    }

    public function processAdd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required|string|max:30",
                "role" => "required",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:6|confirmed"
            ],
        );
        // if ($validator->fails()) {
        //     $request['role'] = Role::select('id', 'name')->find($request->role);
        //     return redirect()
        //         ->back()
        //         ->withInput($request->all)
        //         ->withErrors($validator);
        // }
        $role = DB::table('roles')->where('id', $request->role)->first();
        $assignrole = $role->name;
        // return ($role->name);
        DB::beginTransaction();
        try {
            $inserting = User::create(
                [
                    'id_unit' => $request->id_unit,
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'is_aktif' => 0,
                    'email_verified_at' => now(),
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(10),
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at
                ]
            );
            $inserting->assignRole($assignrole);
            //allert
            if ($inserting) {
                return redirect()->back()->with("success", "Data berhasil ditambahkan");
            } else {
                return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            // $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
        }
    }

    public function show(User $user)
    {
        //
        $role =  DB::table('roles')->select('name')->where('id', $user->role)->first();
        $authorities =  config('permission.authorities');
        $permissionChecked = $user->getAllPermissions()->pluck('name')->toArray();

        return view('pengaturan.user.user_detail', [
            'user' => $user,
            'role' => $role,
            'authorities' => $authorities,
            'permissionChecked' => $permissionChecked
        ]);
        // return $permissionChecked;
    }

    public function update(User $user)
    {
        try {
            $role = Role::all();
            $unit = Unit::all();
            $userrole = User::join();
            return view("pengaturan.user.user_update")->with(['user' => $user, 'unit' => $unit, 'userrole' => $userrole, 'role' => $role, 'roleSelected' => $user->roles->first()]);
            // return $user->getAllPermissions();
            // return ($user->role);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function processUpdate(Request $request, User $user)
    {
        // $request->validate([]);

        // $process = User::findOrFail($id)->update($request->except('_token'));
        // if ($process) {
        //     return redirect()->back()->with("success", "Data berhasil diperbarui");
        // } else {
        //     return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        // }
        // bismillah
        $validator = Validator::make(
            $request->all(),
            [
                "role" => "required",
            ],
            [],
            $this->attributes()
        );
        if ($validator->fails()) {
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        // dd($request->all());

        $role = DB::table('roles')->where('id', $request->role)->first();
        $assignrole = $role->name;
        DB::beginTransaction();
        // dd($assignrole);


        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->role = $request->role;
            $user->syncRoles($assignrole);
            $user->save();
            //allert
            if ($user) {
                return redirect()->back()->with("success", "Data berhasil ditambahkan");
            } else {
                return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
        }
    }

    public function delete(User $user)
    {
        // try {
        //     $process = User::findOrFail($id)->delete();
        //     if ($process) {
        //         return redirect()->back()->with("success", "Data berhasil dihapus");
        //     } else {
        //         return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
        //     }
        // } catch (\Exception $e) {
        //     abort(404);
        // }
        $role = DB::table('roles')->where('id', $user->role)->first();
        $assignrole = $role->name;
        DB::beginTransaction();
        // dd($assignrole);


        try {
            $user->removeRole($assignrole);
            $user->delete();
            //allert
        } catch (\Throwable $th) {
            DB::rollBack();
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
    public function search(Request $request)
    {
    }
    public function attributes()
    {
        return
            [
                "name" => "Nama",
                "role" => "Role",
                "email" => "Email",
                "password" => "Password",
            ];
    }
    public function isAktif(Request $request)
    {
        $user = User::find($request->id);
        $user->is_aktif = $request->is_aktif;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
