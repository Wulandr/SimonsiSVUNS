<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\SubKegiatan;
use App\Models\Tor;
use App\Models\Unit;
use App\Models\Triwulan;
use App\Models\User;
use Spatie\Permission\Models\Role;

class MonitoringUsulanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ajuan_monitoring', ['only' => 'index']);
    }

    public function index()
    {
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $tor = DB::table('tor')->orderBy('tgl_mulai_pelaksanaan', 'asc')->get();
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
        $tabelRole =  Role::all(); //untuk menampilkan pilihan multi role di topbar
        return view(
            "perencanaan.monitoringUsulan.index",
            [
                'tor' => $tor, 'trx_status_tor' => $trx_status_tor, 'status' => $status,
                'prodi' => $prodi, 'users' => $users, 'roles' => $roles, 'dokMemo' => $dokMemo,
                'trx_status_keu' => $trx_status_keu, 'status_keu' => $status_keu, 'tw' => $tw,
                'filtertw' => $filtertw, 'tahun' => $tahun, 'tabelRole' => $tabelRole
            ]
        );
    }
    public function filter_tw(Request $request)
    {
        $roleUser = Auth()->user()->role;
        if ($roleUser == 2) {
            abort(403);
        }
        $filtertw = $request->filterTw;
        if ($filtertw == 0) {
            return redirect('/monitoringUsulan');
        } elseif ($filtertw != 0) {
            $tor = DB::table('tor')->where('id_tw', $filtertw)->get();
        }
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
        $tabelRole =  Role::all(); //untuk menampilkan pilihan multi role di topbar

        return view(
            "perencanaan.monitoringUsulan.index",
            [
                'tor' => $tor, 'trx_status_tor' => $trx_status_tor, 'status' => $status,
                'prodi' => $prodi, 'users' => $users, 'roles' => $roles, 'dokMemo' => $dokMemo,
                'trx_status_keu' => $trx_status_keu, 'status_keu' => $status_keu, 'tw' => $tw,
                'filtertw' => $filtertw, 'tahun' => $tahun, 'tabelRole' => $tabelRole
            ]
        );
        // return $tor;
    }
}
