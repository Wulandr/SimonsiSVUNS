<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkController;
use App\Http\Controllers\TwController;
use App\Http\Controllers\IkuController;
use App\Http\Controllers\LPJController;
use App\Http\Controllers\MakController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\RPDController;
use App\Http\Controllers\SPJController;
use App\Http\Controllers\TorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaguController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubKController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PedomanController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\MemoCairController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\DetailMakController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\BelanjaMakController;
use App\Http\Controllers\KelompokMakController;
use App\Http\Controllers\SPJKategoriController;
use App\Http\Controllers\MonitoringKakController;
use App\Http\Controllers\PersekotKerjaController;
use App\Http\Controllers\SPJSubKategoriController;
use App\Http\Controllers\MonitoringUsulanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});
Route::get('/tidak_aktif', function () {
    return view('dashboards.users.layouts.tidak_aktif');
})->name('tidak_aktif');
Route::get('/logout', function () {
    return view('welcome');
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['IsAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::group(['prefix' => 'sv', 'middleware' =>  ['IsProdi', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [ProdiController::class, 'index'])->name('sv.dashboard');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profil', [ProfilController::class, 'profil']);

    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles_create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles_store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles_edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles_update/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles_destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/isaktif', [UserController::class, 'isAktif']);
    Route::get('/user/create', [UserController::class, 'add']);
    Route::post('/user/create', [UserController::class, 'processAdd']);
    Route::get('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/update/{user}', [UserController::class, 'processUpdate'])->name('user.processUpdate');
    Route::get('/user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('roles/detail/{user}', [UserController::class, 'show'])->name('user.detail');

    Route::post('/profil/update/{id}', [ProfilController::class, 'editprofil'])->name('profil.update');
    Route::post('/profil/changepassword/{id}', [ProfilController::class, 'editpassword'])->name('profil.changepassword');

    Route::post('/rab/create', [RabController::class, 'processAdd']);
    Route::get('/rab/update/{id}', [RabController::class, 'update']);
    Route::post('/rab/update/{id}', [RabController::class, 'processUpdate']);
    Route::get('/rab/delete/{id}', [RabController::class, 'delete']);
    Route::get('/rab/detail/{id}', [RabController::class, 'detail']);

    Route::get('/anggaran', [AnggaranController::class, 'index']);
    Route::get('/anggaran/create', [AnggaranController::class, 'add']);
    Route::post('/anggaran/create', [AnggaranController::class, 'processAdd']);
    Route::get('/anggaran/update/{id}', [AnggaranController::class, 'update']);
    Route::post('/anggaran/update/{id}', [AnggaranController::class, 'processUpdate']);
    Route::get('/anggaran/delete/{id}', [AnggaranController::class, 'delete']);
    Route::post('/anggaran/inputlpj', [AnggaranController::class, 'inputLpj']);

    //  M A K
    Route::get('/getkelompokMak/{id}', [AnggaranController::class, 'getKelompokMak']);
    Route::get('/getbelanjaMak/{id}', [AnggaranController::class, 'getBelanjaMak']);
    Route::get('/getdetailMak/{id}', [AnggaranController::class, 'getDetailMak']);
    Route::get('/getdetailHargaMak/{id}', [AnggaranController::class, 'getDetailHargaMak']);


    Route::get('/validasi', [ValidasiController::class, 'index']);
    Route::get('/validasi/ajuan/{prodi}', [ValidasiController::class, 'ajuan']);
    Route::get('/validasi/filter', [ValidasiController::class, 'filter_tahun']);
    Route::post('/validasi/pengajuanProdi', [ValidasiController::class, 'pengajuanProdi']);
    Route::post('/validasi/createVerTor', [ValidasiController::class, 'verifTor']);
    Route::post('/validasi/createValTor', [ValidasiController::class, 'validTor']);
    Route::get('/detailtor/{id}', [ValidasiController::class, 'detail']);
    Route::get('/detailrab/{id}', [ValidasiController::class, 'detailRab']);


    // Route::get('/tor', [TorController::class, 'index']);
    Route::get('/pengajuantor', [TorController::class, 'pengajuan']);
    Route::get('/steppengajuantor', [TorController::class, 'stepPengajuan']);
    Route::get('/lengkapitor/{id}', [TorController::class, 'lengkapitor']);
    // Route::get('/tor/filter_tahun/{tahun}', [TorController::class, 'filter_tahun']);
    Route::get('/filtertahun', [TorController::class, 'filter_tahun']);
    Route::get('/filterpagu', [TorController::class, 'filter_pagu']);
    // Route::get('/tor/create', [TorController::class, 'add']);
    Route::post('/tor/create', [TorController::class, 'processAdd']);
    Route::get('/tor/update/{id}', [TorController::class, 'update']);
    Route::post('/tor/update/{id}', [TorController::class, 'processUpdate']);
    Route::get('/tor/revisi/{id}', [TorController::class, 'revisi']);
    Route::post('/tor/revisi/{id}', [TorController::class, 'processRevisi']);
    Route::get('/tor/delete/{id}', [TorController::class, 'delete']);
    Route::get('/tor/changeStatus', [TorController::class, 'changeStatus']);
    Route::post('/tor/ajuanKeg', [TorController::class, 'ajuanProdi']);

    Route::get('/torab', [TorController::class, 'pengajuan2']);
    Route::post('/tor/create_jadwal', [TorController::class, 'createJadwal']);
    Route::post('/tor/update_jadwal/{id}', [TorController::class, 'updateJadwal']);
    Route::get('/tor/delete_jadwal/{id}', [TorController::class, 'deleteJadwal']);
    Route::post('/tor/create_indikator', [TorController::class, 'createIndikator']);

    Route::get('/pagu', [PaguController::class, 'index']);
    Route::post('/pagu/create', [PaguController::class, 'processAdd']);
    Route::post('/pagu/update/{id}', [PaguController::class, 'processUpdate']);
    Route::get('/pagu/delete/{id}', [PaguController::class, 'delete']);
    Route::get('/pagu/filtertahun', [PaguController::class, 'filter_tahun']);

    Route::get('/iku', [IkuController::class, 'index']);
    Route::post('/iku/create', [IkuController::class, 'processAdd']);
    Route::post('/iku/update/{id}', [IkuController::class, 'processUpdate']);
    Route::get('/iku/delete/{id}', [IkuController::class, 'delete']);
    Route::get('/iku/filtertahun', [IkuController::class, 'filter_tahun']);

    Route::get('/ik', [IkController::class, 'index']);
    Route::post('/ik/create', [IkController::class, 'processAdd']);
    Route::post('/ik/update/{id}', [IkController::class, 'processUpdate']);
    Route::get('/ik/delete/{id}', [IkController::class, 'delete']);

    Route::get('/k', [KController::class, 'index']);
    Route::post('/k/create', [KController::class, 'processAdd']);
    Route::post('/k/update/{id}', [KController::class, 'processUpdate']);
    Route::get('/k/delete/{id}', [KController::class, 'delete']);

    Route::get('/subk', [SubKController::class, 'index']);
    Route::post('/subk/create', [SubKController::class, 'processAdd']);
    Route::post('/subk/update/{id}', [SubKController::class, 'processUpdate']);
    Route::get('/subk/delete/{id}', [SubKController::class, 'delete']);

    Route::get('/triwulan', [TwController::class, 'index']);
    Route::post('/triwulan/create', [TwController::class, 'processAdd']);
    Route::post('/triwulan/update/{id}', [TwController::class, 'processUpdate']);
    Route::get('/triwulan/delete/{id}', [TwController::class, 'delete']);
    Route::get('/triwulan/filtertahun', [TwController::class, 'filter_tahun']);

    Route::get('/pedomans', [PedomanController::class, 'index']);
    Route::post('/pedomans/create', [PedomanController::class, 'store']);
    Route::post('/pedomans/update/{id}', [PedomanController::class, 'processUpdate']);
    Route::get('/pedomans/delete/{id}', [PedomanController::class, 'delete']);

    Route::get('/tahun', [TahunController::class, 'index']);
    Route::post('/tahun/create', [TahunController::class, 'processAdd']);
    Route::post('/tahun/update/{id}', [TahunController::class, 'processUpdate']);
    Route::get('/tahun/delete/{id}', [TahunController::class, 'delete']);
    Route::get('/tahun/filtertahun', [TahunController::class, 'filter_tahun']);
    Route::get('/tahun/isaktif', [TahunController::class, 'isAktif']);

    Route::get('/unit', [UnitController::class, 'index']);
    Route::post('/unit/create', [UnitController::class, 'processAdd']);
    Route::post('/unit/update/{id}', [UnitController::class, 'processUpdate']);
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete']);
    Route::get('/unit/filtertahun', [UnitController::class, 'filter_tahun']);

    Route::get('/mak', [MakController::class, 'index']);
    Route::post('/mak/create', [MakController::class, 'processAdd']);
    Route::post('/mak/update/{id}', [MakController::class, 'processUpdate']);
    Route::get('/mak/delete/{id}', [MakController::class, 'delete']);
    Route::get('/mak/filtertahun', [MakController::class, 'filter_tahun']);

    Route::get('/kelompok_mak', [KelompokMakController::class, 'index']);
    Route::post('/kelompok_mak/create', [KelompokMakController::class, 'processAdd']);
    Route::post('/kelompok_mak/update/{id}', [KelompokMakController::class, 'processUpdate']);
    Route::get('/kelompok_mak/delete/{id}', [KelompokMakController::class, 'delete']);

    Route::get('/belanja_mak', [BelanjaMakController::class, 'index']);
    Route::post('/belanja_mak/create', [BelanjaMakController::class, 'processAdd']);
    Route::post('/belanja_mak/update/{id}', [BelanjaMakController::class, 'processUpdate']);
    Route::get('/belanja_mak/delete/{id}', [BelanjaMakController::class, 'delete']);

    Route::get('/detail_mak', [DetailMakController::class, 'index']);
    Route::post('/detail_mak/create', [DetailMakController::class, 'processAdd']);
    Route::post('/detail_mak/update/{id}', [DetailMakController::class, 'processUpdate']);
    Route::get('/detail_mak/delete/{id}', [DetailMakController::class, 'delete']);
    Route::get('/searchDetail', [DetailMakController::class, 'searchDetail']);
    Route::get('/searchBelanja', [BelanjaMakController::class, 'searchBelanja']);

    Route::get('/monitoringUsulan', [MonitoringUsulanController::class, 'index'])->name('monitoringUsulan');
    Route::get('/monitoringUsulan/filterTw', [MonitoringUsulanController::class, 'filter_tw']);

    // R O U T E    K E U A N G A N

    // Memo Cair
    Route::get('/memo_cair', [MemoCairController::class, 'index']);
    Route::post('/store', [MemoCairController::class, 'store']);

    // Persekot Kerja
    Route::get('/persekot_kerja', [PersekotKerjaController::class, 'index']);
    Route::post('/input_pk', [PersekotKerjaController::class, 'create']);
    Route::post('/persekot_kerja/validasi', [PersekotKerjaController::class, 'validasiPK']);
    Route::post('/persekot_kerja/input_buktitransfer', [PersekotKerjaController::class, 'input_transferPK']);

    // SPJ
    Route::get('/spj', [SPJController::class, 'index']);
    Route::post('/input_spj', [SPJController::class, 'create']);
    Route::get('/upload_spj', [SPJController::class, 'uploadSpj']);
    Route::post('/upload_spj/tambah_files', [SPJController::class, 'addFile']);
    Route::post('/spj/validasi', [SPJController::class, 'validasiSpj']);
    Route::post('/spj/input_buktitransfer', [SPJController::class, 'input_transferSpj']);

    // SPJ Kategori
    Route::get('/spj_kategori', [SPJKategoriController::class, 'index']);
    Route::post('/spj_kategori/add', [SPJKategoriController::class, 'processAdd']);
    Route::post('/spj_kategori/update/{id}', [SPJKategoriController::class, 'processUpdate']);
    Route::get('/spj_kategori/delete/{id}', [SPJKategoriController::class, 'delete']);

    // SPJ Sub-Kategori
    Route::get('/spj_subkategori', [SPJSubKategoriController::class, 'index']);
    Route::post('/spj_subkategori/add', [SPJSubKategoriController::class, 'processAdd']);
    Route::post('/spj_subkategori/update/{id}', [SPJSubKategoriController::class, 'processUpdate']);
    Route::get('/spj_subkategori/delete/{id}', [SPJSubKategoriController::class, 'delete']);

    // LPJ
    Route::get('/lpj', [LPJController::class, 'index']);
    Route::post('/input_lpj', [LPJController::class, 'create']);
    Route::post('/lpj/validasi', [LPJController::class, 'validasiLpj']);

    // MONITORING KAK
    Route::get('/monitoring_kak', [MonitoringKakController::class, 'index']);
});
