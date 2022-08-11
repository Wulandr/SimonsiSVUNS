<?php

namespace App\Http\Controllers;

use App\Models\Tor;
use App\Models\User;
use App\Models\Dokumen;
use App\Models\MemoCair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class MemoCairController extends Controller
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
        $data = MemoCair::all();
        $tabelRole =  Role::all();
        return view('keuangan.memo_cair.index_memocair', compact(
            'data',
            'tor',
            'trx_status_tor',
            'status',
            'prodi',
            'users',
            'roles',
            'triwulan',
            'dokumen',
            'tabelRole'
        ));

        if (auth()->user()->id_unit != 1) {
            $tor = Tor::where('id_unit', auth()->user()->id_unit)
                ->orderBy('created_at', 'desc');
        }
    }

    public function store(Request $request)
    {
        //memvalidasi inputan
        $request->validate([]);
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

        $upload2 = new MemoCair;
        $upload2->nomor = $request->nomor;
        $upload2->nominal = $request->nominal;
        $upload2->id_tor = $request->id_tor;
        $upload2->save();
        if ($upload2) {
            return redirect()->back()->with("success", "Sertifikat Memo Cair Sudah Terbit");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
        //kembali ke halaman sebelumnya
        return back();
    }

    public function edit(Request $request, $id)
    {
        $request->validate([]);

        $process = Memocair::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function datatable()
    {
        $user = auth()->user();

        $return = [];
        $tor = Tor::all();
        $trx_status_tor = DB::table('trx_status_tor')->get();
        $status = DB::table('status')->get();
        $prodi = DB::table('unit')->get();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $triwulan = DB::table('triwulan')->get();
        $dokumen = DB::table('dokumen')->get();
        $data = MemoCair::all();
        $nomor = 0;
        $namaprodi = '';
        $namatw = '';

        // Untuk inisialisasi Role
        foreach ($roles as $role) {
            if ($role->id == Auth::user()->role) {
                $RoleLogin = $role->name;
            }
        }
        // Inisialisasi TOR
        for ($m = 0; $m < count($tor); $m++) {
            $ada = 0; //sudah diajukan apa belum

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
                            $statusTor[$ada]['tor'] = "TOR" . $tor[$m]->id;
                            $ada += 1;
                            for ($u = 0; $u < count($users); $u++) {
                                if ($trx_status_tor[$tr]->create_by == $users[$u]->id) {
                                    for ($r = 0; $r < count($roles); $r++) {
                                        if ($users[$u]->role == $roles[$r]->id) {
                                            $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $trx_status_tor[$tr]->role_by;
                                            for ($d = 0; $d < count($dokumen); $d++) {
                                                if ($dokumen[$d]->id_tor  == $tor[$m]->id) {
                                                    $statusTor[0]['sudahUpload'] = 1;
                                                }
                                            }
                                            if ($statusTor[0]['status'] == "Validasi - WD 3") {

                                                // Mengambil data Nama Unit (Prodi) dari tabel TOR
                                                for ($v = 0; $v < count($prodi); $v++) {
                                                    if ($prodi[$v]->id == $tor[$m]->id_unit) {
                                                        $namaprodi = $prodi[$v]->nama_unit;
                                                        // Mengambil data Triwulan dari tabel TOR
                                                        for ($x = 0; $x < count($triwulan); $x++) {
                                                            if ($triwulan[$x]->id == $tor[$m]->id_tw) {
                                                                $namatw = $triwulan[$x]->triwulan;

                                                                $return[$m]['no'] = $nomor + 1;
                                                                $nomor += 1;
                                                                $return[$m]['nama_kegiatan'] = $tor[$m]->nama_kegiatan;
                                                                $return[$m]['prodi'] = $namaprodi;
                                                                $return[$m]['tw'] = $namatw;
                                                                if ($statusTor[0]['sudahUpload'] == 1) {
                                                                    $return[$m]['status'] =
                                                                        "<button type='button'
                                                                            class='btn iq-bg-primary btn-rounded btn-sm my-0'>Sudah
                                                                            Terbit
                                                                        </button>";
                                                                } else {
                                                                    $return[$m]['status'] =
                                                                        "<button type='button'
                                                                            class='btn iq-bg-danger btn-rounded btn-sm my-0'>Belum
                                                                            Terbit
                                                                        </button>";
                                                                }
                                                                
                                                                $return[$m]['button'] = '';
                                                                if ($statusTor[0]['sudahUpload'] == 1) {
                                                                    if ($user->can('memo_detail')) :
                                                                        $return[$m]['button'] .=
                                                                            "<button class='btn btn-sm bg-info rounded-pill' title='Detail'
                                                                                data-toggle='modal'
                                                                                data-target='#detail_memocair{$tor[$m]->id}'><i
                                                                                    class='las la-external-link-alt'></i></i>
                                                                            </button>";
                                                                    // MODAL - Detail Memo Cair
                                                                    // return view('keuangan/memo_cair/detail_memocair');
                                                                    // include('keuangan/memo_cair/detail_memocair');
                                                                    endif;
                                                                    if ($user->can('memo_edit')) :
                                                                        $return[$m]['button'] .=
                                                                            "<button class='btn btn-sm bg-warning rounded-pill' title='Edit'
                                                                                data-toggle='modal'
                                                                                data-target='#edit_memocair{$tor[$m]->id}'><i
                                                                                    class=' las la-edit'></i></i>
                                                                            </button>";
                                                                    // <!-- MODAL - Edit Memo Cair -->
                                                                    // @include('keuangan/memo_cair/edit_memocair')
                                                                    endif;
                                                                } else {
                                                                    if ($RoleLogin === 'Prodi') {
                                                                        if ($user->can('memo_create')) :
                                                                            $return[$m]['button'] .=
                                                                                "<button type='button' class='btn bg-dark btn-rounded btn-sm my-0'
                                                                                    title='Upload File Memo Cair' data-toggle='modal'
                                                                                    data-target='#upload_memocair{$tor[$m]->id}'><i
                                                                                        class='las la-upload'></i>
                                                                                </button>";

                                                                        // <!-- MODAL - Upload Memo Cair -->
                                                                        // @include('keuangan/memo_cair/upload_memocair')
                                                                        endif;
                                                                    } else {
                                                                        $return[$m]['button'] .= "<span class='badge border border-danger text-danger'>Prodi Belum Upload Memo Cair</span>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return datatables()::of($return)->rawColumns(['status', 'button'])->tojson();
    }
}
