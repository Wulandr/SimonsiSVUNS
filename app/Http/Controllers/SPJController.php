<?php

namespace App\Http\Controllers;

use App\Models\SPJ;
use App\Models\Tor;
use App\Models\Unit;
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
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

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
          $tor_one = Tor::where('id', '=', base64_decode($request['idtor']))->first();
          // cari rab
          $rab = DB::table('rab')->where('id_tor', $tor_one->id)->get();
          $idrab = [];
          foreach ($rab as $isi) :
               $idrab[] = $isi->id;
          endforeach;

          $anggaran = DB::table('anggaran')->wherein('id_rab', $idrab)->get();
          $iddetailmak = [];
          foreach ($anggaran as $isi) :
               $iddetailmak[] = $isi->id_detail_mak;
          endforeach;

          $detail_mak = DB::table('detail_mak')->wherein('id', $iddetailmak)->get();
          $id_mak = [];
          foreach ($detail_mak as $isi) :
               $id_mak[] = $isi->id_belanja;
          endforeach;

          $mak = DB::table('mak')->wherein('id', $id_mak)->get();
          $id_kategori = [];
          foreach ($mak as $isi) :
               $id_kategori[] = $isi->id_spjkategori;
          endforeach;

          $spj_kategori = SPJKategori::wherein('id', $id_kategori)->get();
          $spj_subkategori = SPJSubKategori::all();
          $id_unit = $tor_one->id_unit;
          $namaprodi = Unit::where('id', '=', $id_unit)->first()->nama_unit;
          $memocair = MemoCair::where('id_tor', '=', base64_decode($request['idtor']))->first()->nomor;
          $penanggung = $tor_one->nama_pic;
          $kontak = $tor_one->kontak_pic;
          $nama_kegiatan = $tor_one->nama_kegiatan;
          $anggaran = $tor_one->jumlah_anggaran;
          $tabelRole =  Role::all();
          return view(
               'keuangan.spj.upload_spj',
               compact(
                    'memo_cair',
                    'persekot_kerja',
                    'tor',
                    'tor_one',
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
                    'nama_kegiatan',
                    'kontak',
                    'tabelRole',
                    'anggaran'
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
          // cari rab
          $rab = DB::table('rab')->where('id_tor', $tor_one->id)->get();
          $idrab = [];
          foreach ($rab as $isi) :
               $idrab[] = $isi->id;
          endforeach;

          $anggaran = DB::table('anggaran')->wherein('id_rab', $idrab)->get();
          $iddetailmak = [];
          foreach ($anggaran as $isi) :
               $iddetailmak[] = $isi->id_detail_mak;
          endforeach;

          $detail_mak = DB::table('detail_mak')->wherein('id', $iddetailmak)->get();
          $id_mak = [];
          foreach ($detail_mak as $isi) :
               $id_mak[] = $isi->id_belanja;
          endforeach;

          $mak = DB::table('mak')->wherein('id', $id_mak)->get();
          $id_kategori = [];
          foreach ($mak as $isi) :
               $id_kategori[] = $isi->id_spjkategori;
          endforeach;

          $spj_kategori = SPJKategori::wherein('id', $id_kategori)->get();
          $spj_subkategori = SPJSubKategori::all();

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
          $uploadspj->id_tor = base64_decode($request->id_tor);
          $uploadspj->nilai_total = $request->nilai_total;
          $uploadspj->nilai_kembali = $request->nilai_kembali;
          $uploadspj->save();

          //Menyimpan ke TRX Status
          $upload2 = TrxStatusKeu::create([
               'id_status' => 5,
               'id_tor' => base64_decode($request->id_tor),
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
               $id_tor          = base64_decode($request->id_tor);
               //memindahkan file ke folder tujuan
               $file->move('documents', $file->getClientOriginalName());
          }
          if (empty($request->file)) {
               $file      = "null";
               $nama_file      = "null";
               $id_subkategori = $request->id_subkategori;
               $id_tor          = base64_decode($request->id_tor);
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
               return redirect()->back()->with("success", "Status Berhasil diubah");
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

     public function datatable()
     {
          $user = auth()->user();
          $totalRecord = Tor::all()->count();
          $pk = [];
          $tor = Tor::all();
          $trx_status_tor = DB::table('trx_status_tor')->get();
          $status = DB::table('status')->get();
          $prodi = DB::table('unit')->get();
          $users = DB::table('users')->get();
          $roles = DB::table('roles')->get();
          $status_keu =  DB::table('status_keu')->get();
          $trx_status_keu = TrxStatusKeu::all();
          $dokumen = DB::table('dokumen')->get();
          $memo_cair = MemoCair::all();
          $nomor = 0;
          $namaprodi = '';

          // Untuk inisialisasi Role
          foreach ($roles as $role) {
               if ($role->id == Auth::user()->role) {
                    $RoleLogin = $role->name;
               }
          }
          // Inisialisasi TOR
          $namaprodi = '';
          for ($m = 0; $m < count($tor); $m++) {
               $ada = 0; //sudah diajukan apa belum
               $cektor = 0; //mengecek hanya ada 1 tor 
               // S T A T U S
               $statusTor = [
                    [
                         'tor' => '',
                         'status' => '',
                         'sudahUpload' => 0
                    ]
               ];

               // Mengambil data Nama Kegiatan yang SUDAH DIVALIDASI WD 1 dari tabel TOR
               for ($tr = 0; $tr < count($trx_status_tor); $tr++) {
                    if ($trx_status_tor[$tr]->id_tor == $tor[$m]->id) {
                         for ($s = 0; $s < count($status); $s++) {
                              if ($trx_status_tor[$tr]->id_status == $status[$s]->id) {
                                   $ada += 1;
                                   for ($u = 0; $u < count($users); $u++) {
                                        if ($trx_status_tor[$tr]->create_by == $users[$u]->id) {
                                             for ($r = 0; $r < count($roles); $r++) {
                                                  if ($users[$u]->role == $roles[$r]->id) {
                                                       $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $roles[$r]->name;
                                                       for ($d = 0; $d < count($dokumen); $d++) {
                                                            if ($dokumen[$d]->id_tor  == $tor[$m]->id) {
                                                                 $statusTor[$ada]['tor'] = "TOR" . $tor[$m]->id;
                                                                 $statusTor[0]['sudahUpload'] = 1;
                                                            }
                                                       }
                                                       if ($statusTor[0]['sudahUpload'] == 1 && $cektor != $tor[$m]->id) {

                                                            // Mengambil data Nama Unit (Prodi) dari tabel TOR
                                                            for ($v = 0; $v < count($prodi); $v++) {
                                                                 if ($prodi[$v]->id == $tor[$m]->id_unit) {
                                                                      $namaprodi = $prodi[$v]->nama_unit;

                                                                      $spj[$m]['no'] = $nomor + 1;
                                                                      $nomor += 1;
                                                                      $spj[$m]['nama_kegiatan'] = $tor[$m]->nama_kegiatan;
                                                                      $spj[$m]['prodi'] = $namaprodi;
                                                                      $spj[$m]['pic'] = $tor[$m]->nama_pic;

                                                                      for ($a = 0; $a < count($memo_cair); $a++) {
                                                                           if ($memo_cair[$a]->id_tor == $tor[$m]->id) {
                                                                                $spj[$m]['no_memo'] = $memo_cair[$a]->nomor;
                                                                           }
                                                                      }

                                                                      if ($user->can('spj_create')) :
                                                                           $spj[$m]['status'] = "<span class='badge border border-danger text-danger'>Belum ada status</span>";
                                                                      endif;
                                                                      foreach ($trx_status_keu as $a) {
                                                                           if ($a->id_tor == $tor[$m]->id) {
                                                                                foreach ($status_keu as $b) {
                                                                                     if ($a->id_status == $b->id && $b->kategori == 'SPJ') {
                                                                                          $spj[$m]['status'] =
                                                                                               "<button type='button' 
                                                                                                    class='badge border border-primary text-primary' 
                                                                                                    data-toggle='modal' data-target='#status_spj{$tor[$m]->id}'>$b->nama_status
                                                                                               </button>";

                                                                                          //     Jika Role Staf Keuangan 
                                                                                          if ($RoleLogin === 'Staf Keuangan') {
                                                                                               $spj[$m]['status'] =
                                                                                                    "<button type='button' 
                                                                                                              class='badge border border-primary text-primary' 
                                                                                                              data-toggle='modal' data-target='#status_spj{$tor[$m]->id}'>{$b->nama_status}
                                                                                                         </button>&nbsp" .
                                                                                                    "<span type='button' class='badge badge-dark' 
                                                                                                              data-toggle='modal' data-target='#validasi_spj{$tor[$m]->id}'>
                                                                                                              <i class='ri-edit-fill'></i>
                                                                                                         </span>";

                                                                                               if ($b->nama_status == 'Revisi') {
                                                                                                    $spj[$m]['status'] =
                                                                                                         "<button type='button' 
                                                                                                              class='badge border border-primary text-primary' 
                                                                                                              data-toggle='modal' data-target='#status_spj{$tor[$m]->id}'>{$b->nama_status}
                                                                                                         </button>&nbsp" .
                                                                                                         "<span type='button' class='badge badge-secondary' 
                                                                                                              data-toggle='modal' data-target='#revisi_spj{$tor[$m]->id}'>
                                                                                                              <i class='las la-comment'></i>
                                                                                                         </span>";
                                                                                               } elseif ($b->nama_status == 'Verifikasi') {
                                                                                                    $spj[$m]['status'] =
                                                                                                         "<button type='button' 
                                                                                                              class='badge border border-primary text-primary' 
                                                                                                              data-toggle='modal' data-target='#status_spj{$tor[$m]->id}'>{$b->nama_status}
                                                                                                         </button>";
                                                                                               } elseif ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai') {
                                                                                                    $spj[$m]['status'] =
                                                                                                         "<button type='button' 
                                                                                                              class='badge border border-primary text-primary' 
                                                                                                              data-toggle='modal' data-target='#status_spj{$tor[$m]->id}'>{$b->nama_status}
                                                                                                         </button>";
                                                                                               }
                                                                                          }
                                                                                     }
                                                                                }
                                                                           }
                                                                      }

                                                                      if ($user->can('spj_create')) :
                                                                           echo $spj[$m]['status'];
                                                                      endif;
                                                                      //    <!-- MODAL - Status spj -->
                                                                      //    include('keuangan/spj/status_spj')
                                                                      //    <!-- MODAL - Validasi spj -->
                                                                      //    include('keuangan/spj/validasi_spj')
                                                                      //    <!-- MODAL - Revisi spj -->
                                                                      //    include('keuangan/spj/showrevisi_spj')

                                                                      if ($RoleLogin === 'Prodi') {
                                                                           $spj[$m]['button'] =
                                                                                "<a href='" . url('/upload_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                     <button class='btn btn-sm bg-secondary rounded-pill' title='Upload File SPJ'>
                                                                                          <i class='las la-upload'></i>
                                                                                     </button>
                                                                                </a>";
                                                                      } else {
                                                                           $spj[$m]['button'] = '<span class="badge border border-danger text-danger">Prodi Belum Mengajukan SPJ</span>';
                                                                      }

                                                                      foreach ($trx_status_keu as $a) {
                                                                           if ($a->id_tor == $tor[$m]->id) {
                                                                                foreach ($status_keu as $b) {
                                                                                     if ($a->id_status == $b->id && $b->kategori == 'SPJ') {
                                                                                          $spj[$m]['button'] =
                                                                                               "<a href='" . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                    <button class='btn btn-sm bg-info rounded-pill' title='Detail File SPJ'>
                                                                                                         <i class='las la-external-link-alt'></i>
                                                                                                    </button>
                                                                                               </a>";

                                                                                          if ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai') {
                                                                                               $spj[$m]['button'] =
                                                                                                    "<a href='" . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                         <button class='btn btn-sm bg-info rounded-pill' title='Detail File SPJ'>
                                                                                                              <i class='las la-external-link-alt'></i>
                                                                                                         </button>
                                                                                                    </a>&nbsp" .
                                                                                                    "<button class='btn btn-sm bg-success rounded-pill' 
                                                                                                         title='Lihat Bukti Transfer' data-toggle='modal' 
                                                                                                         data-target='#show_tf_spj{$tor[$m]->id}'>
                                                                                                         <i class='las la-check'></i>
                                                                                                    </button>";
                                                                                          } elseif ($RoleLogin === 'Prodi') {
                                                                                               $spj[$m]['button'] =
                                                                                                    "<a href='" . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                         <button class='btn btn-sm bg-info rounded-pill' title='Detail File SPJ'>
                                                                                                              <i class='las la-external-link-alt'></i>
                                                                                                         </button>
                                                                                                    </a>&nbsp" .
                                                                                                    "<a href='" . url('/edit_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                         <button class='btn btn-sm bg-warning rounded-pill' 
                                                                                                              title='Edit File SPJ'>
                                                                                                              <i class='las la-edit'></i>
                                                                                                         </button>
                                                                                                    </a>";

                                                                                               if ($b->nama_status == 'Revisi') {
                                                                                                    $spj[$m]['button'] =
                                                                                                         "<a href='" . url('/upload_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                              <button class='btn btn-sm bg-secondary rounded-pill' 
                                                                                                                   title='Upload File SPJ'>
                                                                                                                   <i class='las la-upload'></i>
                                                                                                              </button>
                                                                                                         </a>";
                                                                                               } elseif ($b->nama_status == 'Verifikasi') {
                                                                                                    $spj[$m]['button'] =
                                                                                                         "<a href='" . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                              <button class='btn btn-sm bg-info rounded-pill' title='Detail File SPJ'>
                                                                                                                   <i class='las la-external-link-alt'></i>
                                                                                                              </button>
                                                                                                         </a>";
                                                                                               } elseif ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai') {
                                                                                                    $spj[$m]['button'] =
                                                                                                         "<a href='" . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                              <button class='btn btn-sm bg-info rounded-pill' title='Detail File SPJ'>
                                                                                                                   <i class='las la-external-link-alt'></i>
                                                                                                              </button>
                                                                                                         </a>&nbsp" .
                                                                                                         "<button class='btn btn-sm bg-success rounded-pill' 
                                                                                                              title='Lihat Bukti Transfer' data-toggle='modal' 
                                                                                                              data-target='#show_tf_spj{$tor[$m]->id}'>
                                                                                                              <i class='las la-check'></i>
                                                                                                         </button>";
                                                                                               }
                                                                                          } elseif ($RoleLogin === 'Staf Keuangan') {
                                                                                               if ($b->nama_status == 'Verifikasi') {
                                                                                                    $spj[$m]['button'] =
                                                                                                         "<a href='" . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                              <button class='btn btn-sm bg-info rounded-pill' title='Detail File SPJ'>
                                                                                                                   <i class='las la-external-link-alt'></i>
                                                                                                              </button>
                                                                                                         </a>&nbsp" .
                                                                                                         "<button class='btn btn-sm bg-info rounded-pill' 
                                                                                                              title='Input Bukti Transfer' data-toggle='modal' 
                                                                                                              data-target='#input_tf_spj{$tor[$m]->id}'>
                                                                                                              <i class='las la-money-check-alt'></i>
                                                                                                         </button>";
                                                                                               } elseif ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai') {
                                                                                                    $spj[$m]['button'] =
                                                                                                         "<a href='" . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . "'>
                                                                                                              <button class='btn btn-sm bg-info rounded-pill' title='Detail File SPJ'>
                                                                                                                   <i class='las la-external-link-alt'></i>
                                                                                                              </button>
                                                                                                         </a>&nbsp" .
                                                                                                         "<button class='btn btn-sm bg-success rounded-pill' 
                                                                                                              title='Lihat Bukti Transfer' data-toggle='modal' 
                                                                                                              data-target='#show_tf_spj{$tor[$m]->id}'>
                                                                                                              <i class='las la-check'></i>
                                                                                                         </button>";
                                                                                               }
                                                                                          }
                                                                                     }
                                                                                }
                                                                           }
                                                                      }


                                                                      echo $spj[$m]['button'];

                                                                      //     <!-- MODAL - Bukti TF spj -->
                                                                      //     include('keuangan/spj/input_tf_spj')
                                                                      //     include('keuangan/spj/show_tf_spj')
                                                                      //     <?php

                                                                 }
                                                            }
                                                       }
                                                       $cektor = $tor[$m]->id;
                                                  }
                                             }
                                        }
                                   }
                              }
                         }
                    }
               }
          }
          return datatables()::of($spj)->rawColumns(['status', 'button'])->tojson();
     }
}
