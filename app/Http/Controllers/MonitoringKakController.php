<?php

namespace App\Http\Controllers;

use App\Models\Tor;
use App\Models\MemoCair;
use Illuminate\Support\Facades\DB;

class MonitoringKakController extends Controller
{
    public function index()
    {
        $tor = Tor::all();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $triwulan = DB::table('triwulan')->get();
        $dokumen = DB::table('dokumen')->get();
        $data = MemoCair::all();
        return view('keuangan.monitoring_kak.index_kak', compact('data', 'tor', 'trx_status_tor', 'status', 'prodi', 'users', 'roles', 'triwulan', 'dokumen'));
    }
}
