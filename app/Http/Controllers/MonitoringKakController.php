<?php

namespace App\Http\Controllers;

use App\Models\Tor;
use App\Models\MemoCair;
use App\Models\Pagu;
use App\Models\SPJ;
use App\Models\Triwulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class MonitoringKakController extends Controller
{
    private $filtertw = 0;
    private $tahuntw = 0;

    private function cekWulan()
    {
        $model = Tor::all();
        if (!isset($_REQUEST['filterTw'])) {
            $tw = DB::table('triwulan')->where('periode_awal', '<=', date('Y-m-d'))->where('periode_akhir', '>=', date('Y-m-d'))->first();
            $model = DB::table('tor')->where('id_tw', $tw->id)->get();
            $this->filtertw = $tw->id;
            $this->tahuntw = $tw->id_tahun;
        }
        return $model;
    }

    public function index()
    {
        $tor = $this->cekWulan();
        // $tor = DB::table('tor')->where('id_tw', $filtertw)->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $tw = DB::table('triwulan')->get();
        $tahun = DB::table('tahun')->get();
        $pagu = Pagu::where('id_tahun', $this->tahuntw)->get();
        $dokMemo = DB::table('dokumen')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $status_keu = DB::table('status_keu')->get();
        $filtertw = $this->filtertw;
        $data = MemoCair::all();
        $spj = SPJ::all();
        $tabeltahun = DB::table('tahun')->get();
        $tabelRole =  Role::all(); //untuk menampilkan pilihan multi role di topbar
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
                'spj',
                'tabelRole'
            )

        );
    }

    public function filter_tw(Request $request)
    {
        $filtertw = base64_decode($request->filterTw);
        $tor = Tor::all();
        if ($filtertw == 'all') {
            // return redirect('/monitoring_kak');
            $tor = Tor::all();
        } elseif ($filtertw != 0) {
            $tor = DB::table('tor')->where('id_tw', $filtertw)->get();
        }
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $tw = DB::table('triwulan')->get();
        if ($filtertw != 0) {
            $this->tahuntw = Triwulan::where('id', $filtertw)->first()->id_tahun;
            $pagu = Pagu::where('id_tahun', $this->tahuntw)->get();
        } else {
            $pagu = Pagu::all();
        }
        $tahun = DB::table('tahun')->get();
        $dokMemo = DB::table('dokumen')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $status_keu = DB::table('status_keu')->get();
        $data = MemoCair::all();
        $spj = SPJ::all();
        $tabeltahun = DB::table('tahun')->get();
        $tabelRole =  Role::all(); //untuk menampilkan pilihan multi role di topbar

        return view(
            "keuangan.monitoring_kak.index_kak",
            [
                'tor' => $tor, 'trx_status_tor' => $trx_status_tor, 'status' => $status,
                'prodi' => $prodi, 'users' => $users, 'roles' => $roles, 'dokMemo' => $dokMemo,
                'trx_status_keu' => $trx_status_keu, 'status_keu' => $status_keu, 'tw' => $tw,
                'filtertw' => $filtertw, 'tahun' => $tahun, 'pagu' => $pagu, 'data' => $data, 'tabeltahun' => $tabeltahun,
                'tabelRole' => $tabelRole, 'spj' => $spj
            ]
        );
    }
}
