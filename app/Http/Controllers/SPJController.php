<?php

namespace App\Http\Controllers;

use App\Models\SPJ;
use App\Models\Tor;
use App\Models\Dokumen;
use App\Models\Pedoman;
use App\Models\MemoCair;
use App\Models\DokumenSPJ;
use App\Models\SPJKategori;
use App\Models\TrxStatusKeu;
use Illuminate\Http\Request;
use App\Models\PersekotKerja;
use App\Models\SPJSubKategori;
use Illuminate\Support\Facades\DB;

class SPJController extends Controller
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
          $spj = SPJ::all();
          $dok_spj = DokumenSPJ::all();
          $status_keu =  DB::table('status_keu')->get();
          $trx_status_keu = TrxStatusKeu::all();
          $spj_kategori = SPJKategori::all();
          $spj_subkategori = SPJSubKategori::all();
          $pedoman = Pedoman::all();
          return view(
               'keuangan.spj.index_spj',
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
                    'spj',
                    'dok_spj',
                    'status_keu',
                    'trx_status_keu',
                    'spj_kategori',
                    'spj_subkategori',
                    'pedoman'
               )
          );
     }

     public function uploadSpj()
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
          $spj = SPJ::all();
          $dok_spj = DokumenSPJ::all();
          $status_keu =  DB::table('status_keu')->get();
          $trx_status_keu = TrxStatusKeu::all();
          $spj_kategori = SPJKategori::all();
          $spj_subkategori = SPJSubKategori::all();
          return view(
               'keuangan.spj.upload_spj',
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
                    'spj',
                    'dok_spj',
                    'status_keu',
                    'trx_status_keu',
                    'spj_kategori',
                    'spj_subkategori'
               )
          );
     }

     public function create(Request $request)
     {
          $uploadspj = new SPJ();
          $uploadspj->id_tor = $request->id_tor;
          $uploadspj->nilai_total = $request->nilai_total;
          $uploadspj->nilai_kembali = $request->nilai_kembali;
          $uploadspj->save();

          //Menyimpan ke TRX Status
          $upload2 = TrxStatusKeu::create([
               'id_status' => 4,
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

     public function validasiSpj(Request $request)
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

     public function input_transferSPJ(Request $request)
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
               'id_status' => 7,
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
