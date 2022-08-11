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
    private $filtertw = [];
    private $tahuntw = [];
    private $id_tahun = '';

    private function cekWulan()
    {
        $model = Tor::all();
        if (!isset($_REQUEST['filterTw'])) {
            $tw = DB::table('triwulan')->where('periode_awal', '<=', date('Y-m-d'))->where('periode_akhir', '>=', date('Y-m-d'))->first();
            $model = DB::table('tor')->where('id_tw', $tw->id)->get();
            $this->filtertw = $tw->id;
            $this->id_tahun = $tw->id_tahun;
            $this->tahuntw = substr($tw->triwulan, 0, 4);
            $this->triwulantw = substr($tw->triwulan, -1, 1);
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
        $pagu = Pagu::where('id_tahun', $this->id_tahun)->get();
        $dokMemo = DB::table('dokumen')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $status_keu = DB::table('status_keu')->get();
        $filtertw = $this->filtertw;
        $data = MemoCair::all();
        $spj = SPJ::all();
        $tabeltahun = DB::table('tahun')->get();
        $tabelRole =  Role::all(); //untuk menampilkan pilihan multi role di topbar
        $getTahun = $this->tahuntw;
        $getTriwulan = $this->triwulantw;

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
                'tabelRole',
                'getTahun',
                'getTriwulan',
            )

        );
    }

    public function filter_tw(Request $request)
    {
        $tahunTw = base64_decode($request->tahunTw);
        $triwulanTw = base64_decode($request->triwulanTw);
        if ($tahunTw == 'jY')
            $tahunTw = '';
        if ($triwulanTw == 'jY')
            $triwulanTw = '';
        $model = Triwulan::where('triwulan', 'like', '%' . $tahunTw . '%' . $triwulanTw . '%')->get();

        $filtertw = [];
        foreach ($model as $isi) :
            $filtertw[] = $isi->id;
        endforeach;

        $tor = Tor::all();
        if (empty($filtertw)) {
            // return redirect('/monitoring_kak');
            $tor = Tor::all();
        } elseif ($filtertw != 0) {
            $tor = DB::table('tor')->wherein('id_tw', $filtertw)->get();
        }
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $tw = DB::table('triwulan')->get();
        if (!empty($filtertw)) {
            // $this->tahuntw = Triwulan::wherein('id', $filtertw)->first()->id_tahun;
            foreach (Triwulan::wherein('id', $filtertw)->get() as $isi) :
                $this->tahuntw[] = $isi->id_tahun;
            endforeach;
            $pagu = Pagu::wherein('id_tahun', $this->tahuntw)->get();
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

        if (count($filtertw) == 1) :
            $filtertw = $filtertw[0];
        endif;
        // var_dump(base64_decode($request->tahunTw));
        // exit;
        return view(
            "keuangan.monitoring_kak.index_kak",
            [
                'tor' => $tor, 'trx_status_tor' => $trx_status_tor, 'status' => $status,
                'prodi' => $prodi, 'users' => $users, 'roles' => $roles, 'dokMemo' => $dokMemo,
                'trx_status_keu' => $trx_status_keu, 'status_keu' => $status_keu, 'tw' => $tw,
                'filtertw' => $filtertw, 'tahun' => $tahun, 'pagu' => $pagu, 'data' => $data, 'tabeltahun' => $tabeltahun,
                'tabelRole' => $tabelRole, 'spj' => $spj, 'getTahun' => base64_decode($request->tahunTw), 'getTriwulan' => base64_decode($request->triwulanTw)
            ]
        );
    }
}
