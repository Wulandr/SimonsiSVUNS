<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SPJSubKategori;

class SPJSubKategoriController extends Controller
{
    public function index()
    {
        $spj_kategori = SPJSubKategori::all();
        return view(
            "pengaturan.spj_subkategori.index_spjsubkategori",
            [
                'spj_kategori' => $spj_kategori,
            ]
        );
    }
    public function processAdd(Request $request)
    {
        $request->validate([]);

        $inserting = SPJSubKategori::all()->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);

        $process = SPJSubKategori::all()->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        try {
            $process = SPJSubKategori::all()->where('id', $id)->delete();
            if ($process) {
                return redirect()->back()->with("success", "Data berhasil dihapus");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
