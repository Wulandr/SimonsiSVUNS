<?php

namespace App\Http\Controllers;

use StatusKeu;
use App\Models\Tor;
use App\Models\Dokumen;
use App\Models\MemoCair;
use App\Models\TrxStatusKeu;
use Illuminate\Http\Request;
use App\Models\PersekotKerja;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PersekotKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $memo_cair = MemoCair::all();
        $persekot_kerja = PersekotKerja::all();
        $status_keu =  DB::table('status_keu')->get();
        $trx_status_keu = TrxStatusKeu::all();
        $tabelRole =  Role::all();
        return view(
            'keuangan.persekot_kerja.index_persekotkerja',
            compact(
                'memo_cair',
                'persekot_kerja',
                'tor',
                'trx_status_tor',
                'status',
                'prodi',
                'users',
                'roles',
                'triwulan',
                'dokumen',
                'status_keu',
                'trx_status_keu',
                'tabelRole'
            )
        );
    }
    public function create(Request $request)
    {
        $request->validate([]);

        $upload2 = new PersekotKerja();
        $upload2->id_tor = $request->id_tor;
        $upload2->alokasi_anggaran = $request->alokasi_anggaran;
        $upload2->tgl_selesai = $request->tgl_selesai;
        $upload2->save();

        $upload2 = TrxStatusKeu::create([
            'id_status' => 1,
            'id_tor' => $request->id_tor,
            'create_by' => $request->create_by,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        if ($upload2) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function validasiPK(Request $request)
    {
        $userLogin = Auth()->user()->id;
        $unitUser = Auth()->user()->id_unit; //prodi mana?
        $roleUser = Auth()->user()->role;
        if ($roleUser ==  2) {
            abort(403);
        }

        $request->validate([]);

        $inserting = DB::table('trx_status_keu')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function input_transferPK(Request $request)
    {
        $request->validate([]);

        //mengambil data file yang diupload
        $file           = $request->file('file');
        //mengambil nama file
        $nama_file      = $file->getClientOriginalName();
        $jenis          = $request->jenis;
        $id_tor          = $request->id_tor;
        //memindahkan file ke folder tujuan
        $file->move('documents', $file->getClientOriginalName());

        $input_tf         = new Dokumen;
        $input_tf->name   = $nama_file;
        $input_tf->path   = $nama_file;
        $input_tf->jenis  = $jenis;
        $input_tf->id_tor  = $id_tor;

        //menyimpan data ke database
        $input_tf->save();

        $input_tf2 = TrxStatusKeu::create([
            'id_status' => 3,
            'id_tor' => $request->id_tor,
            'create_by' => $request->create_by,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        if ($input_tf2) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
}
