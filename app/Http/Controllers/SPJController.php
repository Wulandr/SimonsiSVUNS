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
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\PersekotKerja;
use App\Models\SPJSubKategori;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

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
          $tabelRole =  Role::all(); //utk menampilkan topbar pilihan multi role
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
                    'pedoman',
                    'tabelRole'
               )
          );
     }

     public function uploadSpj(Request $request)
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
          $tor_one = Tor::where('id', '=', base64_decode($request['idtor']))->first();
          $id_unit = $tor_one->id_unit;
          $namaprodi = Unit::where('id', '=', $id_unit)->first()->nama_unit;
          $memocair = MemoCair::where('id_tor', '=', base64_decode($request['idtor']))->first()->nomor;
          $penanggung = $tor_one->nama_pic;
          $kontak = $tor_one->kontak_pic;
          $tabelRole =  Role::all();
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
                    'spj_subkategori',
                    'namaprodi',
                    'memocair',
                    'penanggung',
                    'kontak',
                    'tabelRole'
               )
          );
     }

     public function editSpj(Request $request)
     {
          $tor = Tor::all();
          $tabelRole =  Role::all();
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
          $id_tor = base64_decode($request['idtor']);
          $tor_one = Tor::where('id', '=', $id_tor)->first();
          $id_unit = $tor_one->id_unit;
          $namaprodi = Unit::where('id', '=', $id_unit)->first()->nama_unit;
          $memocair = MemoCair::where('id_tor', '=', $id_tor)->first()->nomor;
          $spj_value = SPJ::where('id_tor', '=', $id_tor)->first();
          $penanggung = $tor_one->nama_pic;
          $kontak = $tor_one->kontak_pic;
          $nilai_total = $spj_value->nilai_total;
          $nilai_kembali = $spj_value->nilai_kembali;

          return view(
               'keuangan.spj.edit_spj',
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
                    'namaprodi',
                    'memocair',
                    'penanggung',
                    'kontak',
                    'nilai_total',
                    'nilai_kembali',
                    'tabelRole',
                    'id_tor'
               )
          );
     }

     public function detailSpj(Request $request)
     {
          $tabelRole =  Role::all();
          $tor = Tor::all();
          $tabelRole =  Role::all();
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
          $id_tor = base64_decode($request['idtor']);
          $tor_one = Tor::where('id', '=', $id_tor)->first();
          $id_unit = $tor_one->id_unit;
          $namaprodi = Unit::where('id', '=', $id_unit)->first()->nama_unit;
          $memocair = MemoCair::where('id_tor', '=', $id_tor)->first()->nomor;
          $spj_value = SPJ::where('id_tor', '=', $id_tor)->first();
          $penanggung = $tor_one->nama_pic;
          $kontak = $tor_one->kontak_pic;
          $nilai_total = $spj_value->nilai_total;
          $nilai_kembali = $spj_value->nilai_kembali;

          return view(
               'keuangan.spj.detail_spj',
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
                    'namaprodi',
                    'memocair',
                    'penanggung',
                    'kontak',
                    'nilai_total',
                    'nilai_kembali',
                    'tabelRole',
                    'id_tor'
               )
          );
     }

     public function create(Request $request)
     {
          // Menyimpan Form Input SPJ ke Database
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

          $upload2->save();

          if (!empty($request->file)) {
               //mengambil data file yang diupload
               $file           = $request->file('file');
               //mengambil nama file
               $nama_file      = $file->getClientOriginalName();
               $id_subkategori = $request->id_subkategori;
               $id_tor          = $request->id_tor;
               //memindahkan file ke folder tujuan
               $file->move('documents', $file->getClientOriginalName());
          }
          if (empty($request->file)) {
               $file      = "null";
               $nama_file      = "null";
               $id_subkategori = $request->id_subkategori;
               $id_tor          = $request->id_tor;
          }

          $addfile_spj         = new DokumenSPJ;
          $addfile_spj->name   = $nama_file;
          $addfile_spj->path   = $nama_file;
          $addfile_spj->id_subkategori  = $id_subkategori;
          $addfile_spj->id_tor  = $id_tor;

          //menyimpan data ke database
          $addfile_spj->save();

          if ($addfile_spj) {
               return redirect()->action([SPJController::class, 'index'])->with("success", "Data berhasil ditambahkan");
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
          if (!empty($request->file)) {
               //mengambil data file yang diupload
               $file           = $request->file('file');
               //mengambil nama file
               $nama_file      = $file->getClientOriginalName();
               $jenis          = $request->jenis;
               $id_tor          = $request->id_tor;
               //memindahkan file ke folder tujuan
               $file->move('documents', $file->getClientOriginalName());
          }
          if (empty($request->file)) {
               $file      = "null";
               $nama_file      = "null";
               $jenis          = $request->jenis;
               $id_tor          = $request->id_tor;
          }
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
          // return $request->all();
          if ($input_tf2) {
               return redirect()->back()->with("success", "Data berhasil ditambahkan");
          } else {
               return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
          }
     }
}
