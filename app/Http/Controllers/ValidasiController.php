<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use App\Models\Anggaran;
use App\Models\Tor;
use App\Models\Unit;
use App\Models\Triwulan;
use App\Models\User;
use App\Models\SubKegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ValidasiController extends Controller
{
    // protected $table = 'tor';
    public function __construct()
    {
        $this->middleware('permission:ajuan_validasi', ['only' => 'index']);
        $this->middleware('permission:tor_verifikasi', ['only' => 'verifKegiatan']);
        $this->middleware('permission:tor_validasi', ['only' => 'validKegiatan']);
    }
    public function index()
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $unit = Unit::all();
        $rab = Rab::all();
        $tabelanggaran = Anggaran::all();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $tor = DB::table('tor')->get();
        $user = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $triwulan = DB::table('triwulan')->get();
        $notifikasiTor = Tor::notifikasi();
        $tabelRole =  Role::all();

        return view(
            "perencanaan.validasi.index",
            [
                'unit' => $unit, 'rab' => $rab, 'tabelanggaran' => $tabelanggaran, 'trx_status_tor' => $trx_status_tor,
                'status' => $status, 'tor' => $tor, 'triwulan' => $triwulan, 'notifikasiTor' => $notifikasiTor,
                'role' => $role, 'user' => $user, 'tabelRole' => $tabelRole
            ]
        );
        // return $notifikasi;
    }
    public function ajuan($prodi)
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }
        if ($prodi != 0) {
            $join = DB::table('tor')
                ->where('id_unit', $prodi)
                ->join('trx_status_tor', 'tor.id', '=', 'trx_status_tor.id_tor')
                ->join('status', 'trx_status_tor.id_status', '=', 'status.id')
                ->where('status.nama_status', "Proses Pengajuan")
                ->select('tor.id as tor_id', 'trx_status_tor.id as trx_id', 'tor.*', 'trx_status_tor.*')->get();
        }
        if ($prodi == 0) {
            $join = DB::table('tor')
                ->join('trx_status_tor', 'tor.id', '=', 'trx_status_tor.id_tor')
                ->join('status', 'trx_status_tor.id_status', '=', 'status.id')
                ->join('triwulan', 'tor.id_tw', '=', 'triwulan.id')
                ->where('status.nama_status', "Proses Pengajuan")
                ->select('tor.id as tor_id', 'trx_status_tor.id as trx_id', 'tor.*', 'trx_status_tor.*', 'triwulan.triwulan')->get();
        }
        $ajuanTW =  DB::table('tor')
            ->join('trx_status_tor', 'tor.id', '=', 'trx_status_tor.id_tor')
            ->join('triwulan', 'tor.id_tw', '=', 'triwulan.id')
            ->select('tor.id as tor_id', 'trx_status_tor.id as trx_id', 'tor.*', 'trx_status_tor.*', 'triwulan.triwulan')->get();
        $filtertahun = 0;
        $filterprodi = $prodi;
        $filtertw = 0;
        $unit = Unit::all();
        $unit2 = Unit::all();
        $userrole = User::join();
        $user = User::all();
        $tw = Triwulan::all();
        $tw2 = Triwulan::all();
        $rab = Rab::all();
        $anggaran = Anggaran::Rab_Ang();
        $totalpertw = Anggaran::total_anggaran_tw();
        $detail_mak = DB::table('detail_mak')->get();
        // $tahun = DB::table('tor')->get();
        $tabeltor = DB::table('tor')->get();
        $role = DB::table('roles')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodipilih = $prodi;
        $tabeltahun = DB::table('tahun')->get();
        $triwulan = DB::table('triwulan')->get();
        $tabelRole =  Role::all();
        return view(
            "perencanaan.validasi.ajuan3",
            [
                'tabeltor' => $tabeltor, 'join' => $join, 'unit' => $unit, 'unit2' => $unit2, 'tw' => $tw, 'tw2' => $tw2, 'userrole' => $userrole, 'rab' => $rab, 'anggaran' => $anggaran, 'detail_mak' => $detail_mak,
                'totalpertw' => $totalpertw, 'trx_status_tor' => $trx_status_tor, 'status' => $status, 'filtertahun' => $filtertahun, 'triwulan' => $triwulan,
                'prodi' => $prodipilih, 'tabeltahun' => $tabeltahun, 'user' => $user, 'role' => $role, 'ajuanTW' => $ajuanTW, 'filtertw' => $filtertw, 'filterprodi' => $filterprodi,
                'tabelRole' => $tabelRole
            ]
        );
        // return $join;
    }
    public function verifTor(Request $request)
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $request->validate([]);

        $inserting = DB::table('trx_status_tor')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function pengajuanProdi(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('trx_status_tor')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function validTor(Request $request)
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $request->validate([]);

        $inserting = DB::table('trx_status_tor')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function detail($id) //DETAIL TOR
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $id = $id;
        $tor = Tor::all();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $rab = DB::table('rab')->get();
        $userrole = User::join();
        $tw = Triwulan::all();
        $detail_mak = DB::table('detail_mak')->get();
        // $tahun = DB::table('tor')->get();
        $status = DB::table('status')->get();
        $roles = DB::table('roles')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $kategori_subK =  SubKegiatan::Kategori_Sub();
        $komponen_jadwal = DB::table('komponen_jadwal')->get();
        $indikator_iku = DB::table('indikator_iku')->get();
        $users = DB::table('users')->get();
        $anggaran = DB::table('anggaran')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $rab_ang = Anggaran::Rab_Ang();

        return view(
            "perencanaan.validasi.detail_tor",
            [
                'tor' => $tor, 'rab' => $rab, 'unit' => $unit, 'unit2' => $unit2, 'tw' => $tw, 'userrole' => $userrole,  'detail_mak' => $detail_mak,
                'status' => $status, 'tabeltahun' => $tabeltahun, 'pagu' => $pagu, 'subkeg' => $subkeg,
                'kategori_subK' => $kategori_subK, 'komponen_jadwal' => $komponen_jadwal, 'users' => $users,
                'indikator_iku' => $indikator_iku, 'id' => $id, 'trx_status_tor' => $trx_status_tor, 'roles' => $roles,
                'anggaran' => $anggaran, 'subkeg' => $subkeg,  'rab_ang' => $rab_ang, 'detail_mak' => $detail_mak,
            ]
        );
        // return $tor;
    }
    public function detailRab($id)
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $id = $id;
        $rab = DB::table('rab')->get();
        $tor = Tor::all();
        $anggaran = DB::table('anggaran')->get();
        $status = DB::table('status')->get();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $userrole = User::join();
        $user = User::all();
        $detail_mak = DB::table('detail_mak')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $rab_ang = Anggaran::Rab_Ang();
        return view(
            "perencanaan.validasi.detail_rab",
            [
                'id' => $id, 'tor' => $tor, 'unit' => $unit, 'unit2' => $unit2,  'userrole' => $userrole,  'detail_mak' => $detail_mak,
                'rab' => $rab, 'anggaran' => $anggaran, 'subkeg' => $subkeg,  'rab_ang' => $rab_ang,
                'user' => $user, 'status' => $status
            ]
        );
        // return $totalpertw;
    }

    public function filter_tahun(Request $request)
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $filterprodi = $request->prodi;
        if ($filterprodi == 0) {
            if ($request->triwulan == 0) {
                redirect('back');
            }
            if (!empty($request->triwulan)) {
                // $tor = DB::table('tor')->where('tgl_mulai_pelaksanaan', 'LIKE', $request->tahun . '%')->simplepaginate(3);
                $join = DB::table('tor')
                    ->join('trx_status_tor', 'tor.id', '=', 'trx_status_tor.id_tor')
                    ->join('triwulan', 'tor.id_tw', '=', 'triwulan.id')
                    ->join('status', 'trx_status_tor.id_status', '=', 'status.id')
                    ->select('tor.id as tor_id', 'trx_status_tor.id as trx_id', 'tor.*', 'trx_status_tor.*', 'triwulan.triwulan')
                    ->where('status.nama_status', "Proses Pengajuan")
                    ->where('triwulan.triwulan', 'LIKE', $request->triwulan)
                    ->simplepaginate(4);
            }
            if (empty($request->triwulan)) {
                $join = DB::table('tor')
                    ->join('trx_status_tor', 'tor.id', '=', 'trx_status_tor.id_tor')
                    ->join('triwulan', 'tor.id_tw', '=', 'triwulan.id')
                    ->join('status', 'trx_status_tor.id_status', '=', 'status.id')
                    ->where('status.nama_status', "Proses Pengajuan")
                    ->select('tor.id as tor_id', 'trx_status_tor.id as trx_id', 'tor.*', 'trx_status_tor.*', 'triwulan.triwulan')
                    ->simplepaginate(4);
            }
        } elseif ($filterprodi != 0) {
            if ($request->triwulan == 0) {
                redirect('back');
            }
            if (!empty($request->triwulan)) {
                $join = DB::table('tor')
                    ->join('trx_status_tor', 'tor.id', '=', 'trx_status_tor.id_tor')
                    ->join('triwulan', 'tor.id_tw', '=', 'triwulan.id')
                    ->select('tor.id as tor_id', 'trx_status_tor.id as trx_id', 'tor.*', 'trx_status_tor.*', 'triwulan.triwulan')
                    ->join('status', 'trx_status_tor.id_status', '=', 'status.id')
                    ->where('status.nama_status', "Proses Pengajuan")
                    ->where('id_unit', $filterprodi)
                    ->where('triwulan.triwulan', 'LIKE', $request->triwulan)
                    ->simplepaginate(5);
            }
            if (empty($request->triwulan)) {
                $join = DB::table('tor')
                    ->join('trx_status_tor', 'tor.id', '=', 'trx_status_tor.id_tor')
                    ->join('triwulan', 'tor.id_tw', '=', 'triwulan.id')
                    ->join('status', 'trx_status_tor.id_status', '=', 'status.id')
                    ->select('tor.id as tor_id', 'trx_status_tor.id as trx_id', 'tor.*', 'trx_status_tor.*', 'triwulan.triwulan')
                    ->where('status.nama_status', "Proses Pengajuan")
                    ->where('id_unit', $filterprodi)
                    ->simplepaginate(5);
            }
        }

        $filtertahun = 0;
        $filtertw = $request->triwulan;
        $unit = Unit::all();
        $unit2 = Unit::all();
        $userrole = User::join();
        $user = User::all();
        $role = DB::table('roles')->get();
        $tw = Triwulan::all();
        $tw2 = Triwulan::all();
        $rab = Rab::all();
        $anggaran =  Anggaran::Rab_Ang();
        $tabeltor = DB::table('tor')->get();
        $totalpertw = Anggaran::total_anggaran_tw();
        $detail_mak = DB::table('detail_mak')->get();
        $tabeltahun = DB::table('tahun')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $triwulan = DB::table('triwulan')->get();
        $tabelRole =  Role::all();
        return view(
            "perencanaan.validasi.ajuan3",
            [
                'tabeltor' => $tabeltor, 'unit' => $unit, 'unit2' => $unit2, 'tw' => $tw, 'tw2' => $tw2, 'userrole' => $userrole, 'rab' => $rab, 'anggaran' => $anggaran, 'detail_mak' => $detail_mak,
                'totalpertw' => $totalpertw, 'trx_status_tor' => $trx_status_tor, 'status' => $status,  'filterprodi' => $filterprodi, 'filtertahun' => $filtertahun,
                'tabeltahun' => $tabeltahun, 'join' => $join, 'user' => $user, 'role' => $role, 'filtertw' => $filtertw, 'triwulan' => $triwulan, 'tabelRole' => $tabelRole
            ]
        );
    }
}
