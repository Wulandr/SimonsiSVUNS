<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\IKUModel;
use App\Models\IKModel;
use App\Models\SubKegiatan;
use App\Models\Tor;
use App\Models\Unit;
use App\Models\Pagu;
use App\Models\Triwulan;
use App\Models\TrxStatusKeu;
use App\Models\User;
use Spatie\Permission\Models\Role;

class MonitoringIKUController extends Controller
{

    public function index()
    {
        $tabelRole =  Role::all(); //untuk menampilkan pilihan multi role di topbar
        $prodi = Unit::all();
        $pagus = Pagu::all();
        $subk = SubKegiatan::all();
        $ang_iku = DB::table('tor')
            ->select('id', 'id_unit', 'id_subK', 'jumlah_anggaran', 'id_tw')
            ->get();
        $iku = IKUModel::all();
        $ik = IKModel::all();
        $triwulan = Triwulan::all();
        $pengajuan = DB::table('trx_status_tor') //tor yg sudah diajukan
            ->select('id_tor', 'id_status')
            ->get();
        $status = DB::table('status')->get();
        return view(
            "perencanaan.monitoringIKU.index",
            compact(
                'tabelRole',
                'prodi',
                'pagus',
                'ang_iku',
                'subk',
                'iku',
                'ik',
                'pengajuan',
                'status',
                'triwulan'
            )
        );
    }
}
