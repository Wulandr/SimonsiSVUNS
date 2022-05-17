<?php

namespace App\Http\Controllers;

use App\Models\SPJ;
use App\Models\Tor;
use App\Models\MemoCair;
use App\Models\DokumenSPJ;
use App\Models\TrxStatusKeu;
use Illuminate\Http\Request;
use App\Models\PersekotKerja;
use Illuminate\Support\Facades\DB;

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
        return view('keuangan.spj.index_spj', 
        compact('memo_cair', 'persekot_kerja', 'tor', 'trx_status_tor', 
        'status', 'prodi', 'users', 'roles', 'triwulan', 'dokumen', 
        'spj', 'dok_spj', 'status_keu', 'trx_status_keu'));
    }

    public function uploadSpj()
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
        return view('keuangan.spj.upload_spj', 
        compact('memo_cair', 'persekot_kerja', 'tor', 'trx_status_tor', 
        'status', 'prodi', 'users', 'roles', 'triwulan', 'dokumen', 
        'spj', 'dok_spj', 'status_keu', 'trx_status_keu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            
        ]);

        $uploadspj = new SPJ();
        $uploadspj->id_tor = $request->id_tor;
        $uploadspj->nilai_total = $request->nilai_total;
        $uploadspj->nilai_kembali = $request->nilai_kembali;
        $uploadspj->save();

        // return $uploadspj;
        if ($uploadspj) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SPJ  $sPJ
     * @return \Illuminate\Http\Response
     */
    public function show(SPJ $sPJ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SPJ  $sPJ
     * @return \Illuminate\Http\Response
     */
    public function edit(SPJ $sPJ)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SPJ  $sPJ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SPJ $sPJ)
    {
        //
    }

    // SHOW FILE SPJ
    public function viewSPJfile_1()
    {
         return view('keuangan.show_file.dasarhukum_1');
    }
    public function viewSPJfile_2()
    {
         return view('keuangan.show_file.dasarhukum_2');
    }
    public function viewSPJfile_3()
    {
         return view('keuangan.show_file.panduanspj_1');
    }
    public function viewSPJfile_4()
    {
         return view('keuangan.show_file.panduanspj_2');
    }
    public function viewSPJfile_5()
    {
         return view('keuangan.show_file.template_1');
    }
    public function viewSPJfile_6()
    {
         return view('keuangan.show_file.template_2a');
    }
    public function viewSPJfile_7()
    {
         return view('keuangan.show_file.template_2b');
    }
    public function viewSPJfile_8()
    {
         return view('keuangan.show_file.template_3');
    }
    public function viewSPJfile_9()
    {
         return view('keuangan.show_file.template_4');
    }
    public function viewSPJfile_10()
    {
         return view('keuangan.show_file.template_5');
    }
    public function viewSPJfile_11()
    {
         return view('keuangan.show_file.template_6');
    }
}
