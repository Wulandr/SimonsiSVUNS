<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Pedoman;
use App\Models\SubKegiatan;
use App\Models\Tor;
use App\Models\Unit;
use App\Models\Triwulan;
use App\Models\User;
use App\Models\TrxStatusTor;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use TrxStatusKeu;
use Spatie\Permission\Models\Role;

class TorController extends Controller
{
    protected $table = 'tor';
    public function __construct()
    {
        $this->middleware('permission:tor_create', ['add', 'pengajuan2', 'createJadwal', 'updateJadwal', 'deleteJadwal']);
        $this->middleware('permission:tor_delete', ['only' => 'delete']);
        $this->middleware('permission:tor_update', ['only' => 'update']);
    }
    public function stepPengajuan()
    {
        if (auth()->user()->id_unit != 1) {
            $tor = Tor::where('id_unit', auth()->user()->id_unit)
                // ->where('tgl_pelaksanaan', 'LIKE', date('Y') . '%')
                ->simplepaginate(3);
        }
        if (auth()->user()->id_unit == 1) {
            $tor = DB::table('tor')->simplepaginate(3);
            // $tor = Tor::where('tgl_pelaksanaan', 'LIKE', date('Y') . '%')
            //     ->simplepaginate(3);
        }
        $data = 0;
        $filtertahun = date('Y');
        $filterprodi = 0;
        $unit = Unit::all();
        $userrole = User::join();
        $tw = Triwulan::all();
        // $tahun = DB::table('tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $roles2 = DB::table('roles')->get();
        $PIC = User::pic(auth()->user()->id_unit);
        $tabelRole =  Role::all();

        return view(
            "perencanaan.tor.stepPengajuan",
            [
                'tor' => $tor, 'unit' => $unit, 'tw' => $tw, 'userrole' => $userrole,
                'filtertahun' => $filtertahun, 'data' => $data,
                'filterprodi' => $filterprodi, 'tabeltahun' => $tabeltahun, 'pagu' => $pagu, 'subkeg' => $subkeg,
                'users' => $users, 'roles' => $roles, 'roles2' => $roles2, 'PIC' => $PIC, 'tabelRole' => $tabelRole
            ]
        );
        // return $PIC;
    }
    public function pengajuan2()
    {
        $filterpagu = 0;
        $filtertahun = date('Y');
        if (auth()->user()->id_unit != 1) {
            // $tor = Tor::where('id_unit', auth()->user()->id_unit)->simplePaginate(3);
            $torcount = Tor::where('tgl_mulai_pelaksanaan', 'LIKE',  $filtertahun . '%')
                ->where('id_unit', auth()->user()->id_unit)
                ->get();
            if ($torcount->count() % 2 == 0) {
                $h = 2;
            }
            if ($torcount->count() % 2 != 0) {
                $h = 3;
            }
            $tor = Tor::where('tgl_mulai_pelaksanaan', 'LIKE',  $filtertahun . '%')
                ->where('id_unit', auth()->user()->id_unit)
                ->orderBy('id')->cursorPaginate($h);
            // ->where('tgl_pelaksanaan', 'LIKE', date('Y') . '%')
            // ->simplepaginate(3);
        }
        if (auth()->user()->id_unit == 1) {
            $tor = DB::table('tor')
                // $tor = Tor::where('tgl_pelaksanaan', 'LIKE', date('Y') . '%')
                ->simplePaginate(3);
        }

        // $filtertahun = date('Y');
        $filterprodi = 0;
        $rab = DB::table('rab')->get();
        $role = DB::table('roles')->get();
        $mak = DB::table('mak')->get();
        $anggaran = DB::table('anggaran')->get();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $userrole = User::join();
        $user = User::all();
        $tw = Triwulan::all();
        $tw2 = Triwulan::all();
        $detail_mak = DB::table('detail_mak')->get();
        $tahun = DB::table('tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $indikator_k = DB::table('indikator_k')->get();
        $rab_ang = Anggaran::Rab_Ang();
        $totalpertw = Anggaran::total_anggaran_tw();
        $status = DB::table('status')->get();
        $status_keu = DB::table('status_keu')->get();
        $kategori_subK =  SubKegiatan::Kategori_Sub();
        $komponen_jadwal = DB::table('komponen_jadwal')->get();
        $indikator_iku = DB::table('indikator_iku')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $trx_status_keu = DB::table('trx_status_keu')->get();
        $pedoman = Pedoman::all();
        $tabelRole =  Role::all();

        return view(
            "perencanaan.tor.torab",
            [
                'tor' => $tor, 'unit' => $unit, 'unit2' => $unit2, 'tw' => $tw, 'tw2' => $tw2, 'userrole' => $userrole,  'detail_mak' => $detail_mak,
                'tahun' => $tahun,  'filtertahun' => $filtertahun, 'rab' => $rab, 'mak' => $mak, 'anggaran' => $anggaran,
                'filterprodi' => $filterprodi, 'tabeltahun' => $tabeltahun, 'pagu' => $pagu, 'subkeg' => $subkeg,
                'rab_ang' => $rab_ang, 'totalpertw' => $totalpertw, 'user' => $user, 'status' => $status,
                'subkeg' => $subkeg, 'kategori_subK' => $kategori_subK, 'komponen_jadwal' => $komponen_jadwal, 'filterpagu' => $filterpagu,
                'indikator_iku' => $indikator_iku, 'trx_status_tor' => $trx_status_tor, 'role' => $role,
                'status_keu' => $status_keu, 'trx_status_keu' => $trx_status_keu, 'indikator_k' => $indikator_k, 'pedoman' => $pedoman,
                'tabelRole' => $tabelRole
            ]
        );
        // return $totalpertw;
        // return $tor;
    }
    public function lengkapitor($id) //DETAIL TOR
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?

        $unitTor = DB::table('tor')->select('id_unit')->where('id', $id)->get();
        if ($unitUser !=  $unitTor[0]->id_unit && $unitUser !=  1) {
            abort(403);
        }
        $id = $id;
        $tor = Tor::all();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $rab = DB::table('rab')->get();
        $mak = DB::table('mak')->get();
        $userrole = User::join();
        $tw = Triwulan::all();
        $detail_mak = DB::table('detail_mak')->get();
        $belanja_mak = DB::table('belanja_mak')->get();
        $kelompok_mak = DB::table('kelompok_mak')->get();
        $status = DB::table('status')->get();
        $roles = DB::table('roles')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $kategori_subK =  SubKegiatan::Kategori_Sub();
        $komponen_jadwal = DB::table('komponen_jadwal')->get();
        $indikator_k = DB::table('indikator_k')->get();
        $indikator_iku = DB::table('indikator_iku')->get();
        $users = DB::table('users')->get();
        $anggaran = DB::table('anggaran')->get();
        $tabelRole =  Role::all();

        return view(
            "perencanaan.tor.lengkapitor",
            compact(
                'tor',
                'rab',
                'unit',
                'tw',
                'userrole',
                'status',
                'tabeltahun',
                'pagu',
                'subkeg',
                'kategori_subK',
                'komponen_jadwal',
                'users',
                'indikator_k',
                'indikator_iku',
                'id',
                'trx_status_tor',
                'roles',
                'unit2',
                'anggaran',
                'mak',
                'kelompok_mak',
                'belanja_mak',
                'detail_mak',
                'tabelRole'
            )
        );
    }

    public function add()
    {
        $unit = Unit::all();
        $tw = Triwulan::all();
        $tabelRole =  Role::all();
        return view("perencanaan.tor_create", ['unit' => $unit, 'tw' => $tw, 'tabelRole' => $tabelRole]);
    }

    public function processAdd(Request $request)
    {
        $request->validate([
            'nama_kegiatan'  => 'required',
            'jenis_ajuan'  => 'required',
            'latar_belakang'  => 'required',
            'rasionalisasi'  => 'required',
            'tujuan'  => 'required',
            'mekanisme'  => 'required',
            'keberlanjutan' => 'required',
            'realisasi_IKU' => 'required',
            'target_IKU' => 'required',
            'realisasi_IK' => 'required',
            'target_IK' => 'required',
            'nama_pic' => 'required',
            'email_pic' => 'required',
            'kontak_pic' => 'required',
            'tgl_mulai_pelaksanaan' => 'required',
            'tgl_akhir_pelaksanaan' => 'required',
            'jumlah_anggaran' => 'required',
        ]);

        // $inserting = Tor::create($request->except('_token'));
        $inserting = Tor::create(
            [
                'id_tw' => $request->id_tw,
                'id_unit' => $request->id_unit,
                'id_subK' => $request->id_subK,
                'nama_kegiatan' => $request->nama_kegiatan,
                'jenis_ajuan' => $request->jenis_ajuan,
                'latar_belakang' => $request->latar_belakang,
                'rasionalisasi' => $request->rasionalisasi,
                'tujuan' => $request->tujuan,
                'mekanisme' => $request->mekanisme,
                'keberlanjutan' => $request->keberlanjutan,
                'realisasi_IKU' => $request->realisasi_IKU,
                'target_IKU' => $request->target_IKU,
                'realisasi_IK' => $request->realisasi_IK,
                'target_IK' => $request->target_IK,
                'nama_pic' => $request->nama_pic,
                'email_pic' => $request->email_pic,
                'kontak_pic' => $request->kontak_pic,
                'tgl_mulai_pelaksanaan' => $request->tgl_mulai_pelaksanaan,
                'tgl_akhir_pelaksanaan' => $request->tgl_akhir_pelaksanaan,
                'jumlah_anggaran' => $request->jumlah_anggaran,
                'create_by' => $request->create_by,
                'update_by' => $request->update_by,
            ]
        );

        $data = 1;
        if ($inserting) {
            return redirect('/torab');
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function update($id)
    {
        $tor = Tor::findOrFail($id);
        $userLogin = Auth()->user()->name;
        $roleLogin2 = DB::table('roles')->select('name')->where('id', Auth()->user()->role)->get();

        $pic = DB::table('tor')->select('nama_pic')->where('id', $id)->get();
        // pic tidak bisa mengakses update tor jika bukan tanggung jawabnya
        if ($roleLogin2[0]->name == "PIC" && $userLogin != $pic[0]->nama_pic) {
            abort(403);
        }

        $statusTor =  json_decode(TrxStatusTor::TrxStatus($id), true); //ingin tau statusnya apa saja
        //jika TOR sudah diajukan oleh prodi, jangan dibolehkan untuk update
        if (!empty($statusTor[0]['nama_status'])) {
            if ($statusTor[0]['nama_status'] == "Proses Pengajuan") {
                abort(403);
            }
        }

        $id = $id;
        $data = 0;
        $filtertahun = date('Y');
        $filterprodi = 0;
        $unit = Unit::all();
        $userrole = User::join();
        $tw = Triwulan::all();
        $mak = DB::table('mak')->get();
        $tahun = DB::table('tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $roles2 = DB::table('roles')->get();
        $status = DB::table('status')->get();
        $tabelRole =  Role::all();

        return view(
            "perencanaan.tor.update",
            [
                'tor' => $tor, 'unit' => $unit, 'tw' => $tw, 'userrole' => $userrole,  'mak' => $mak,
                'tahun' => $tahun,  'filtertahun' => $filtertahun, 'data' => $data, 'id' => $id,
                'filterprodi' => $filterprodi, 'tabeltahun' => $tabeltahun, 'pagu' => $pagu, 'subkeg' => $subkeg,
                'users' => $users, 'roles' => $roles, 'roles2' => $roles2, 'trx_status_tor' => $trx_status_tor,
                'status' => $status, 'tabelRole' => $tabelRole
            ]
        );
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);
        $process = Tor::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/torab')->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function revisi($id, Request $request)
    {
        $tor = Tor::findOrFail($id);
        $userLogin = Auth()->user()->name;
        $roleLogin2 = DB::table('roles')->select('name')->where('id', Auth()->user()->role)->get();

        $pic = DB::table('tor')->select('nama_pic')->where('id', $id)->get();
        // pic tidak bisa mengakses update tor jika bukan tanggung jawabnya
        if (($roleLogin2[0]->name != "PIC" && $roleLogin2[0]->name != "Prodi")
            ||
            ($roleLogin2[0]->name == "PIC" && $userLogin != $pic[0]->nama_pic)
            || empty($request->akses)
        ) {
            abort(403);
        }

        // kalo sudah ada perbaikan, tidak boleh ada lagi
        $statusTOR =  TrxStatusTor::TrxStatus($id)->toArray();
        $perbaikan =  TrxStatusTor::StatusPerbaikan($id)->toArray();
        $revisi =  TrxStatusTor::Revisi($id)->toArray();

        /* ABORT : tidak ada revisi,
         ABORT : ada revisi, tapi ada perbaikan */
        if (count($revisi) == count($perbaikan)) {
            abort(403);
        }

        $id = $id;
        $data = 0;
        $filtertahun = date('Y');
        $filterprodi = 0;
        $unit = Unit::all();
        $userrole = User::join();
        $tw = Triwulan::all();
        $mak = DB::table('mak')->get();
        $tahun = DB::table('tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $roles2 = DB::table('roles')->get();
        $status = DB::table('status')->get();
        $tabelRole =  Role::all();

        return view(
            "perencanaan.tor.revisi",
            [
                'tor' => $tor, 'unit' => $unit, 'tw' => $tw, 'userrole' => $userrole,  'mak' => $mak,
                'tahun' => $tahun,  'filtertahun' => $filtertahun, 'data' => $data, 'id' => $id,
                'filterprodi' => $filterprodi, 'tabeltahun' => $tabeltahun, 'pagu' => $pagu, 'subkeg' => $subkeg,
                'users' => $users, 'roles' => $roles, 'roles2' => $roles2, 'trx_status_tor' => $trx_status_tor,
                'status' => $status, 'tabelRole' => $tabelRole
            ]
        );
        // return ($perbaikan);
    }

    public function processRevisi(Request $request, $id)
    {
        $request->validate([]);
        $process = Tor::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/lengkapitor/' . $id)->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $userLogin = Auth()->user()->name;
        $roleLogin2 = DB::table('roles')->select('name')->where('id', Auth()->user()->role)->get();

        $pic = DB::table('tor')->select('nama_pic')->where('id', $id)->get();
        // pic tidak bisa mengakses update tor jika bukan tanggung jawabnya
        if ($roleLogin2[0]->name == "PIC" && $userLogin != $pic[0]->nama_pic) {
            abort(403);
        } else {
            try {
                $process = Tor::findOrFail($id)->delete();
                if ($process) {
                    return redirect()->back()->with("success", "Data berhasil dihapus");
                } else {
                    return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
                }
            } catch (\Exception $e) {
                abort(404);
            }
        }
    }
    public function search(Request $request)
    {
    }
    public function changeStatus(Request $request)
    {
        $tor = Tor::find($request->id);
        $tor->status = $request->status;
        $tor->save();

        return back();
    }
    public function filter_tahun(Request $request)
    {
        // $tor = Tor::where('tgl_pelaksanaan', 'LIKE', $request->tahun . '%')->get();
        // // return response()->json(['tor', $tor]);
        // return json_encode(($tor));
        if ($request->tahun == 0) {
            redirect('/tor');
        }
        if (auth()->user()->id_unit != 1) {
            if (!empty($request->tahun)) {
                $tor = Tor::where('id_unit', auth()->user()->id_unit)
                    ->where('tgl_mulai_pelaksanaan', 'LIKE',  '%' . $request->tahun . '%')
                    ->simplepaginate(2);
            }
            if (empty($request->tahun)) {
                $tor = DB::table('tor')->where('id_unit', auth()->user()->id_unit)->simplepaginate(2);
            }
        }
        if (auth()->user()->id_unit == 1) {
            if (!empty($request->tahun) && empty($request->prodi)) {
                $torcount = Tor::where('tgl_mulai_pelaksanaan', 'LIKE', $request->tahun . '%')->get();
                if ($torcount->count() % 2 == 0) {
                    $h = 2;
                }
                if ($torcount->count() % 2 != 0) {
                    $h = 3;
                }
                $tor = Tor::where('tgl_mulai_pelaksanaan', 'LIKE', $request->tahun . '%')->orderBy('id')->cursorPaginate($h);
            } elseif (empty($request->tahun) && !empty($request->prodi)) {
                $tor = Tor::where('id_unit', 'LIKE', $request->prodi . '%')->simplepaginate(2);
            } elseif (!empty($request->prodi) && !empty($request->tahun)) {
                $tor = Tor::where('tgl_mulai_pelaksanaan', 'LIKE', $request->tahun . '%')
                    ->where('id_unit', 'LIKE', $request->prodi . '%')
                    ->simplepaginate(2);
            } elseif (empty($request->tahun && empty($request->prodi))) {
                $tor = DB::table('tor')->orderBy('id')->cursorPaginate(2);
                // redirect('/tor');
            }
        }

        $filtertahun = $request->tahun;
        $filterprodi = $request->prodi;
        $rab = DB::table('rab')->get();
        $mak = DB::table('mak')->get();
        $anggaran = DB::table('anggaran')->get();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $userrole = User::join();
        $user = User::all();
        $role = DB::table('roles')->get();
        $tw = Triwulan::all();
        $tw2 = Triwulan::all();
        $detail_mak = DB::table('detail_mak')->get();
        $tahun = DB::table('tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $rab_ang = Anggaran::Rab_Ang();
        $totalpertw = Anggaran::total_anggaran_tw();
        $status = DB::table('status')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $kategori_subK =  SubKegiatan::Kategori_Sub();
        $komponen_jadwal = DB::table('komponen_jadwal')->get();
        $indikator_iku = DB::table('indikator_iku')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $pedoman = Pedoman::all();
        $tabelRole =  Role::all();

        return view(
            "perencanaan.tor.torab",
            [
                'tor' => $tor, 'unit' => $unit, 'tw' => $tw, 'unit2' => $unit2, 'tw2' => $tw2, 'userrole' => $userrole,  'detail_mak' => $detail_mak,
                'tahun' => $tahun,  'filtertahun' => $filtertahun, 'rab' => $rab, 'mak' => $mak, 'anggaran' => $anggaran,
                'filterprodi' => $filterprodi, 'tabeltahun' => $tabeltahun, 'pagu' => $pagu, 'subkeg' => $subkeg,
                'rab_ang' => $rab_ang, 'totalpertw' => $totalpertw, 'status' => $status, 'user' => $user, 'role' => $role,
                'subkeg' => $subkeg, 'kategori_subK' => $kategori_subK, 'komponen_jadwal' => $komponen_jadwal,
                'indikator_iku' => $indikator_iku, 'trx_status_tor' => $trx_status_tor, 'pedoman' => $pedoman, 'tabelRole' => $tabelRole
            ]

        );
        // return $tor;
    }
    public function filter_pagu(Request $request)
    {
        if (auth()->user()->id_unit != 1) {
            $tor = Tor::where('id_unit', auth()->user()->id_unit)->simplepaginate(5);
        }
        if (auth()->user()->id_unit == 1) {
            $tor = DB::table('tor')
                ->simplepaginate(5);
        }
        $filterpagu = $request->tahun;
        $filtertahun = 0;
        $filterprodi = 0;
        $rab = DB::table('rab')->get();
        $role = DB::table('roles')->get();
        $mak = DB::table('mak')->get();
        $anggaran = DB::table('anggaran')->get();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $userrole = User::join();
        $user = User::all();
        $tw = Triwulan::all();
        $tw2 = Triwulan::all();
        $detail_mak = DB::table('detail_mak')->get();
        $tahun = DB::table('tor')->get();
        $tabeltahun = DB::table('tahun')->get();
        $pagu = DB::table('pagu')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $rab_ang = Anggaran::Rab_Ang();
        $totalpertw = Anggaran::total_anggaran_tw();
        $status = DB::table('status')->get();
        $subkeg = DB::table('indikator_subK')->get();
        $kategori_subK =  SubKegiatan::Kategori_Sub();
        $komponen_jadwal = DB::table('komponen_jadwal')->get();
        $indikator_iku = DB::table('indikator_iku')->get();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $pedoman = Pedoman::all();
        $tabelRole =  Role::all();

        if ($request->tahun == 0) {
            $pagu = DB::table('pagu')->get();
            redirect('/torab');
        }
        if (!empty($request->tahun)) {
            $pagu = DB::table('pagu')->where('id_tahun', 'LIKE', $request->tahun . '%')->get();
        }
        return view(
            "perencanaan.tor.torab",
            [
                'tor' => $tor, 'unit' => $unit, 'unit2' => $unit2, 'tw' => $tw, 'tw2' => $tw2, 'userrole' => $userrole,  'detail_mak' => $detail_mak,
                'tahun' => $tahun,  'filtertahun' => $filtertahun, 'rab' => $rab, 'mak' => $mak, 'anggaran' => $anggaran,
                'filterprodi' => $filterprodi, 'tabeltahun' => $tabeltahun, 'pagu' => $pagu, 'subkeg' => $subkeg,
                'rab_ang' => $rab_ang, 'totalpertw' => $totalpertw, 'user' => $user, 'status' => $status,
                'subkeg' => $subkeg, 'kategori_subK' => $kategori_subK, 'komponen_jadwal' => $komponen_jadwal, 'filterpagu' => $filterpagu,
                'indikator_iku' => $indikator_iku, 'trx_status_tor' => $trx_status_tor, 'role' => $role, 'pedoman' => $pedoman,
                'tabelRole' => $tabelRole
            ]
        );
    }
    public function ajuanProdi(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('trx_status_kegiatan')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    // J A D W A L    P A D A    T O R
    public function createJadwal(Request $request)
    {
        $request->validate([]);
        $inserting = DB::table('komponen_jadwal')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function updateJadwal(Request $request, $id)
    {
        $request->validate([]);

        $process = DB::table('komponen_jadwal')->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function deleteJadwal($id)
    {
        try {
            $process = DB::table('komponen_jadwal')->where('id', $id)->delete();
            if ($process) {
                return redirect()->back()->with("success", "Data berhasil dihapus");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
