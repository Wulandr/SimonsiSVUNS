<?php

namespace App\Http\Controllers;

use App\Models\BelanjaMak;
use App\Models\DetailMak;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailMakController extends Controller
{
    public function index()
    {
        $mak = DB::table('mak')->get();
        $kelompok_mak = DB::table('kelompok_mak')->get();
        $belanja_mak = DB::table('belanja_mak')->get();
        $detail_mak = DB::table('detail_mak')->simplePaginate(15);
        // $join = BelanjaMak::joinKelompokMak();
        $joinDetail = DB::table('detail_mak')
            ->join('belanja_mak', 'detail_mak.id_belanja', '=', 'belanja_mak.id')
            ->join('kelompok_mak', 'belanja_mak.id_kelompok', '=', 'kelompok_mak.id')
            ->join('mak', 'kelompok_mak.id_mak', '=', 'mak.id')
            ->select('detail_mak.id as idDetail', 'detail_mak.detail', 'belanja_mak.id as idBelanja', 'belanja_mak.belanja', 'mak.id as idMak', 'mak.jenis_belanja', 'kelompok_mak.id as idKelompok', 'kelompok_mak.kelompok',)
            ->simplePaginate(15);
        return view(
            "pengaturan.mak.detail_mak.index",
            [
                'mak' => $mak, 'kelompok_mak' => $kelompok_mak, 'belanja_mak' => $belanja_mak, 'joinDetail' => $joinDetail,
                'detail_mak' => $detail_mak
            ]
        );
        // return ($joinDetail);
    }
    public function processAdd(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('detail_mak')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);

        $process =  DB::table('detail_mak')->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        try {
            $process =  DB::table('detail_mak')->where('id', $id)->delete();
            if ($process) {
                return redirect()->back()->with("success", "Data berhasil dihapus");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
    public function searchDetail(Request $request)
    {
        $search = $request->get('searchDetail');
        $mak = DB::table('mak')->get();
        $kelompok_mak = DB::table('kelompok_mak')->get();
        $belanja_mak = DB::table('belanja_mak')->get();
        $detail_mak = DB::table('detail_mak')->simplePaginate(15);
        if (is_null($search)) {
            // return view('demos.livesearch');
            $joinDetail = DB::table('detail_mak')
                ->join('belanja_mak', 'detail_mak.id_belanja', '=', 'belanja_mak.id')
                ->join('kelompok_mak', 'belanja_mak.id_kelompok', '=', 'kelompok_mak.id')
                ->join('mak', 'kelompok_mak.id_mak', '=', 'mak.id')
                ->select('detail_mak.id as idDetail', 'detail_mak.detail', 'belanja_mak.id as idBelanja', 'belanja_mak.belanja', 'mak.id as idMak', 'mak.jenis_belanja', 'kelompok_mak.id as idKelompok', 'kelompok_mak.kelompok',)
                ->simplePaginate(15);
        } else {
            $joinDetail = DB::table('detail_mak')
                ->join('belanja_mak', 'detail_mak.id_belanja', '=', 'belanja_mak.id')
                ->join('kelompok_mak', 'belanja_mak.id_kelompok', '=', 'kelompok_mak.id')
                ->join('mak', 'kelompok_mak.id_mak', '=', 'mak.id')
                ->select('detail_mak.id as idDetail', 'detail_mak.detail', 'belanja_mak.id as idBelanja', 'belanja_mak.belanja', 'mak.id as idMak', 'mak.jenis_belanja', 'kelompok_mak.id as idKelompok', 'kelompok_mak.kelompok',)
                ->where('detail', 'LIKE', "%{$search}%")
                ->simplePaginate(15);
        }
        return view(
            "pengaturan.mak.detail_mak.index",
            [
                'mak' => $mak, 'kelompok_mak' => $kelompok_mak, 'belanja_mak' => $belanja_mak, 'joinDetail' => $joinDetail,
                'detail_mak' => $detail_mak
            ]
        );
        // return $joinDetail;
    }
}
