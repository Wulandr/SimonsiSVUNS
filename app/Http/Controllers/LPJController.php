<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use App\Models\Tor;
use App\Models\Dokumen;
use App\Models\MemoCair;
use App\Models\Pedoman;
use App\Models\TrxStatusKeu;
use Illuminate\Http\Request;
use App\Models\PersekotKerja;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class LPJController extends Controller
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
        $memo_cair = MemoCair::all();
        $persekot_kerja = PersekotKerja::all();
        $lpj = LPJ::all();
        $status_keu =  DB::table('status_keu')->get();
        $trx_status_keu = TrxStatusKeu::all();
        $pedoman = Pedoman::all();
        $tabelRole =  Role::all();
        return view(
            'keuangan.lpj.index_lpj',
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
                'lpj',
                'status_keu',
                'trx_status_keu',
                'pedoman',
                'tabelRole'
            )
        );
    }

    public function create(Request $request)
    {
        //mengambil data file yang diupload
        $file           = $request->file('file');
        //mengambil nama file
        $nama_file      = $file->getClientOriginalName();
        $jenis          = $request->jenis;
        $id_tor          = $request->id_tor;
        //memindahkan file ke folder tujuan
        $file->move('documents', $file->getClientOriginalName());

        $upload         = new Dokumen;
        $upload->name   = $nama_file;
        $upload->path   = $nama_file;
        $upload->jenis  = $jenis;
        $upload->id_tor  = $id_tor;

        //menyimpan data ke database
        $upload->save();

        $upload2 = new LPJ();
        $upload2->id_tor = $request->id_tor;
        $upload2->mitra = $request->mitra;
        $upload2->pks = $request->pks;
        $upload2->save();

        //Menyimpan ke TRX Status
        $upload2 = TrxStatusKeu::create([
            'id_status' => 8,
            'id_tor' => $request->id_tor,
            'create_by' => $request->create_by,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        if ($upload2) {
            return redirect()->back()->with(
                "success",
                "Data berhasil ditambahkan"
            );
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function validasiLpj(Request $request)
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
            return redirect()->back()->with("success", "Status Berhasil diubah");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
}
