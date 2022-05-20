<?php

namespace App\Http\Controllers;

use App\Models\Tor;
use App\Models\Dokumen;
use App\Models\MemoCair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('keuangan.memo_cair.index_memocair', compact('data', 'tor', 'trx_status_tor', 'status', 'prodi', 'users', 'roles', 'triwulan', 'dokumen'));
    }

    public function store(Request $request)
    {
        //membuat validasi, jika tidak diisi maka akan menampilkan pesan error
        // $this->validate($request, [
        //     'name'          => 'required',
        // ]);
        // $validatedData = $request->validate([
        //  'file' => 'required|pdf',

        // ]);

        // $validator = Validator::make($request->all(), [
        //     'file' => 'required|pdf',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('keuangan.memo_cair.index_memocair')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
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

    public function destroy(MemoCair $memoCair)
    {
        //
    }
}
