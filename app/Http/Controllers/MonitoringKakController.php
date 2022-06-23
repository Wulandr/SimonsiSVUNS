<?php

namespace App\Http\Controllers;

use App\Models\Tor;
use App\Models\MemoCair;
use App\Models\SPJ;
use Illuminate\Http\Request;
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
        $tw = DB::table('triwulan')->get();
        $tahun = DB::table('tahun')->get();
        $pagu = DB::table('pagu')->get();
        $dokMemo = DB::table('dokumen')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $status_keu = DB::table('status_keu')->get();
        $filtertw = 0;
        $data = MemoCair::all();
        $spj = SPJ::all();
        $tabeltahun = DB::table('tahun')->get();
        return view(
            'keuangan.monitoring_kak.index_kak',
            compact(
                'tor',
                'trx_status_tor',
                'status',
                'prodi',
                'users',
                'roles',
                'dokMemo',
                'trx_status_keu',
                'status_keu',
                'tw',
                'filtertw',
                'tahun',
                'pagu',
                'data',
                'tabeltahun',
                'spj'
            )
        );
    }

    public function filter_tw(Request $request)
    {
        $filtertw = $request->filterTw;
        if ($filtertw == 0) {
            return redirect('/monitoring_kak');
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
        $pagu = DB::table('pagu')->get();
        $dokMemo = DB::table('dokumen')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $status_keu = DB::table('status_keu')->get();
        $data = MemoCair::all();
        $spj = SPJ::all();
        $tabeltahun = DB::table('tahun')->get();
        return view(
            "keuangan.monitoring_kak.index_kak",
            [
                'tor' => $tor, 'trx_status_tor' => $trx_status_tor, 'status' => $status,
                'prodi' => $prodi, 'users' => $users, 'roles' => $roles, 'dokMemo' => $dokMemo,
                'trx_status_keu' => $trx_status_keu, 'status_keu' => $status_keu, 'tw' => $tw,
                'filtertw' => $filtertw, 'tahun' => $tahun, 'pagu' => $pagu, 'data' => $data, 'tabeltahun' => $tabeltahun, 'spj' => $spj
            ]
        );
    }
}
