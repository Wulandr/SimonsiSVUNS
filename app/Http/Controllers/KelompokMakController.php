<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KelompokMakController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kelompokmak_show', ['only' => 'index']);
        $this->middleware('permission:kelompokmak_create', ['only' => 'processAdd']);
        $this->middleware('permission:kelompokmak_update', ['only' => 'processUpdate']);
        $this->middleware('permission:kelompokmak_delete', ['only' => 'delete']);
    }
    public function index()
    {
        $mak = DB::table('mak')->get();
        $kelompok_mak = DB::table('kelompok_mak')->get();
        return view(
            "pengaturan.mak.kelompok_mak.index",
            [
                'mak' => $mak, 'kelompok_mak' => $kelompok_mak,
            ]
        );
    }
    public function processAdd(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('kelompok_mak')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);

        $process =  DB::table('kelompok_mak')->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        try {
            $process =  DB::table('kelompok_mak')->where('id', $id)->delete();
            if ($process) {
                return redirect()->back()->with("success", "Data berhasil dihapus");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
    public function filter_tahun(Request $request)
    {
    }
}
