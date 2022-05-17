<?php

namespace App\Http\Controllers;

use App\Models\LPJ;
use App\Models\Tor;
use App\Models\MemoCair;
use App\Models\TrxStatusKeu;
use Illuminate\Http\Request;
use App\Models\PersekotKerja;
use Illuminate\Support\Facades\DB;

class LPJController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('keuangan.lpj.index_lpj', 
        compact('memo_cair', 'persekot_kerja', 'tor', 'trx_status_tor', 
        'status', 'prodi', 'users', 'roles', 'triwulan', 'dokumen', 
        'lpj', 'status_keu', 'trx_status_keu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LPJ  $lPJ
     * @return \Illuminate\Http\Response
     */
    public function show(LPJ $lPJ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LPJ  $lPJ
     * @return \Illuminate\Http\Response
     */
    public function edit(LPJ $lPJ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LPJ  $lPJ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LPJ $lPJ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LPJ  $lPJ
     * @return \Illuminate\Http\Response
     */
    public function destroy(LPJ $lPJ)
    {
        //
    }
}
