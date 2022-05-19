<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Tor;
use App\Models\Unit;
use App\Models\Triwulan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IkController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ik_show', ['only' => 'index']);
        $this->middleware('permission:ik_create', ['only' => 'processAdd']);
        $this->middleware('permission:ik_update', ['only' => 'processUpdate']);
        $this->middleware('permission:ik_delete', ['only' => 'delete']);
    }
    public function index()
    {
        $filtertahun = 0;
        $iku = DB::table('indikator_iku')->get();
        $ik = DB::table('indikator_ik')->simplePaginate(15);
        $k = DB::table('indikator_k')->get();
        $subk = DB::table('indikator_subk')->get();
        $tabeltahun = DB::table('tahun')->get();

        return view(
            "pengaturan.iku.ik.index",
            [
                'iku' => $iku, 'ik' => $ik, 'k' => $k, 'subk' => $subk, 'tabeltahun' => $tabeltahun,
            ]
        );
    }
    public function processAdd(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('indikator_ik')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);

        $process =  DB::table('indikator_ik')->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        try {
            $process =  DB::table('indikator_ik')->where('id', $id)->delete();
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
