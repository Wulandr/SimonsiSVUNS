<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use App\Models\Tor;
use App\Models\Dokumen;
use App\Models\Pedoman;
use App\Models\MemoCair;
use App\Models\TrxStatusKeu;
use Illuminate\Http\Request;
use App\Models\PersekotKerja;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

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
            'id_status' => 11,
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

    public function datatable()
    {
        $totalRecord = Tor::all()->count();
        $tor = Tor::all();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $dokumen = DB::table('dokumen')->get();
        $memo_cair = MemoCair::all();
        $lpj = LPJ::all();
        $dataTabel = [];
        $status_keu =  DB::table('status_keu')->get();
        $trx_status_keu = TrxStatusKeu::all();

        // Mengetahui role user
        foreach ($roles as $role) {
            if ($role->id == Auth::user()->role) {
                $RoleLogin = $role->name;
            }
        }

        $nomor = 0;
        $namaprodi = '';
        for ($m = 0; $m < count($tor); $m++) {
            $ada = 0; //sudah diajukan apa belum
            $cektor = 0; //mengecek hanya ada 1 tor 
            // S T A T U S
            $torVallidasi = "";
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

                                                        $dataTabel[$m]['no'] = $nomor + 1;
                                                        $nomor += 1;
                                                        $dataTabel[$m]['nama_kegiatan'] = $tor[$m]->nama_kegiatan;
                                                        $dataTabel[$m]['prodi'] = $namaprodi;
                                                        $dataTabel[$m]['pic'] = $tor[$m]->nama_pic;

                                                        for ($a = 0; $a < count($memo_cair); $a++) {
                                                            if ($memo_cair[$a]->id_tor == $tor[$m]->id) {
                                                                $dataTabel[$m]['no_memo'] = $memo_cair[$a]->nomor;
                                                            }
                                                        }

                                                        // STATUS
                                                        $dataTabel[$m]['status'] = "<span class='badge border border-danger text-danger'>Belum ada status</span>";

                                                        foreach ($trx_status_keu as $a) {
                                                            if ($a->id_tor == $tor[$m]->id) {
                                                                foreach ($status_keu as $b) {
                                                                    // Jika semua Role kecuali Staf Perencanaan
                                                                    if ($a->id_status == $b->id && $b->kategori == 'LPJ')
                                                                        $dataTabel[$m]['status'] =
                                                                            "<button type='button' 
                                                                                class='badge border border-primary text-primary' 
                                                                                data-toggle='modal' data-target='#status_lpj{$tor[$m]->id}'>{$b->nama_status}
                                                                            </button>";

                                                                    // Jika Role Staf Perencanaan
                                                                    if ($RoleLogin === 'Staf Perencanaan') {
                                                                        $dataTabel[$m]['status'] =
                                                                            "<button type='button' 
                                                                                class='badge border border-primary text-primary' 
                                                                                data-toggle='modal' data-target='#status_lpj{$tor[$m]->id}'>{$b->nama_status}
                                                                            </button>&nbsp" .
                                                                            "<span type='button' 
                                                                                class='badge badge-dark' 
                                                                                data-toggle='modal' data-target='#validasi_lpj{$tor[$m]->id}'>
                                                                                <i class='ri-edit-fill'></i>
                                                                            </span>";

                                                                        if ($b->nama_status == 'Revisi') {
                                                                            $dataTabel[$m]['status'] =
                                                                                "<button type='button' 
                                                                                    class='badge border border-primary text-primary' 
                                                                                    data-toggle='modal' data-target='#status_lpj{$tor[$m]->id}'>{$b->nama_status}
                                                                                </button>&nbsp" .
                                                                                "<span type='button' 
                                                                                    class='badge badge-secondary' data-toggle='modal' 
                                                                                    data-target='#revisi_lpj{$tor[$m]->id}'>
                                                                                    <i class='las la-comment'></i>
                                                                                </span>" .
                                                                                "<span type='button' 
                                                                                    class='badge badge-dark' 
                                                                                    data-toggle='modal' data-target='#validasi_lpj{$tor[$m]->id}'>
                                                                                    <i class='ri-edit-fill'></i>
                                                                                </span>";
                                                                        } elseif ($b->nama_status == 'LPJ Selesai') {
                                                                            $dataTabel[$m]['status'] =
                                                                                "<button type='button' 
                                                                                    class='badge border border-success text-success' 
                                                                                    data-toggle='modal' data-target='#status_lpj{$tor[$m]->id}'>$b->nama_status}
                                                                                </button>";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    // <!-- MODAL - Validasi LPJ -->
                                                    // include('keuangan/lpj/validasi_lpj')
                                                    // <!-- MODAL - Status LPJ -->
                                                    // include('keuangan/lpj/status_lpj')
                                                    // <!-- MODAL - Revisi LPJ -->
                                                    // include('keuangan/lpj/showrevisi_lpj')

                                                    // BUTTON
                                                    if ($RoleLogin === 'Prodi') {
                                                        $dataTabel[$m]['button'] =
                                                            "<button class='btn btn-sm bg-dark rounded-pill' 
                                                                title='Input LPJ' data-toggle='modal' 
                                                                data-target='#input_lpj{$tor[$m]->id}'>
                                                                <i class='las la-upload'></i>
                                                            </button>";
                                                    } else {
                                                        $dataTabel[$m]['button'] =
                                                            "<span class='badge border border-danger text-danger'>Prodi Belum Mengajukan SPJ</span>";
                                                    }

                                                    foreach ($trx_status_keu as $a) {
                                                        if ($a->id_tor == $tor[$m]->id) {
                                                            foreach ($status_keu as $b) {
                                                                if ($a->id_status == $b->id && $b->kategori == 'LPJ') {
                                                                    if ($b->nama_status == 'Proses Pengajuan' || $b->nama_status == 'Revisi') {
                                                                        $dataTabel[$m]['button'] =
                                                                            "<button class='btn btn-sm bg-info rounded-pill' 
                                                                                title='Detail' data-toggle='modal' 
                                                                                data-target='#detail_lpj{$tor[$m]->id}'>
                                                                                <i class='las la-external-link-alt'></i>
                                                                            </button>";

                                                                        // {{-- Jika Role Prodi --}}
                                                                    } elseif ($RoleLogin === 'Prodi') {
                                                                        $dataTabel[$m]['button'] =
                                                                            "<button class='btn btn-sm bg-info rounded-pill' 
                                                                                title='Detail' data-toggle='modal' 
                                                                                data-target='#detail_lpj{$tor[$m]->id}'>
                                                                                <i class='las la-external-link-alt'></i>
                                                                            </button>&nbsp" .
                                                                            "<button class='btn btn-sm bg-warning rounded-pill' 
                                                                                title='Edit' data-toggle='modal' 
                                                                                data-target='#edit_lpj{$tor[$m]->id}'>
                                                                                <i class='las la-edit'></i>
                                                                            </button>";

                                                                        if ($b->nama_status == 'Revisi') {
                                                                            $dataTabel[$m]['button'] =
                                                                                "<button class='btn btn-sm bg-dark rounded-pill' 
                                                                                    itle='Input LPJ' data-toggle='modal' 
                                                                                    data-target='#input_lpj{$tor[$m]->id}'>
                                                                                    <i class='las la-upload'></i>
                                                                                </button>";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    // <!-- MODAL - Edit LPJ -->
                                                    // include('keuangan/lpj/edit_lpj')
                                                    // <!-- MODAL - Detail LPJ -->
                                                    // include('keuangan/lpj/detail_lpj')

                                                    // <!-- MODAL - Input LPJ -->
                                                    // include('keuangan/lpj/input_lpj')
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
        return datatables()::of($dataTabel)->rawColumns(['status', 'button'])->tojson();
    }
}
