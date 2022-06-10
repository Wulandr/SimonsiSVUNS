<?php

namespace App\Http\Controllers;

use App\Models\RPD;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RPDController extends Controller
{
    public function index()
    {
        $filtertahun = 0;
        $rpd = RPD::all();
        $pagu = DB::table('pagu')->get();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $tabeltahun = DB::table('tahun')->get();
        return view(
            "pengaturan.rpd.index_rpd",
            compact('pagu', 'rpd', 'tabeltahun', 'filtertahun', 'unit', 'unit2')
        );
    }
    public function processAdd(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('rpd')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);

        $process =  DB::table('rpd')->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        try {
            $process =  DB::table('rpd')->where('id', $id)->delete();
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
        $filtertahun = $request->tahun;
        $unit = Unit::all();
        $unit2 = Unit::all();
        $tabeltahun = DB::table('tahun')->get();

        if ($request->tahun == 0) {
            $pagu = DB::table('pagu')->get();
            redirect('/rpd');
        }
        if (!empty($request->tahun)) {
            $pagu = DB::table('pagu')->where('id_tahun', 'LIKE', $filtertahun . '%')->get();
        }
        return view(
            "pengaturan.rpd.index_rpd",
            [
                'pagu' => $pagu, 'tabeltahun' => $tabeltahun, 'filtertahun' => $filtertahun,
                'unit' => $unit, 'unit2' => $unit2
            ]
        );
    }
}
