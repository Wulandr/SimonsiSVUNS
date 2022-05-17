<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MakController extends Controller
{
    public function index()
    {
        $mak = DB::table('mak')->get();
        $kelompok_mak = DB::table('kelompok_mak')->get();
        $belanja_mak = DB::table('belanja_mak')->get();

        return view(
            "pengaturan.mak.index",
            [
                'mak' => $mak, 'kelompok_mak' => $kelompok_mak, 'belanja_mak' => $belanja_mak,
            ]
        );
    }
    public function processAdd(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('mak')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);

        $process =  DB::table('mak')->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        try {
            $process =  DB::table('mak')->where('id', $id)->delete();
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
