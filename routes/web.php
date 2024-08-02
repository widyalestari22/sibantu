<?php

use App\Models\Persyaratan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtPenerimaan;
use App\Http\Controllers\RtPenyaluran;
use App\Http\Controllers\StafController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StafPkhController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CetakSalurController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\GeneratePkhController;
use App\Http\Controllers\PengumummanController;
use App\Http\Controllers\PkhPenerimaController;
use App\Http\Controllers\RtDashboardController;
use App\Http\Controllers\RtPengajuanController;
use App\Http\Controllers\PkhDashboardController;
use App\Http\Controllers\PkhPenyaluranController;
use App\Http\Controllers\RtPersyaratanController;
use App\Http\Controllers\StafPengajuanController;
use App\Http\Controllers\GeneratePDfPkhController;
use App\Http\Controllers\StafPenyaluranController;
use App\Http\Controllers\PersyaratanstafController;
use App\Http\Controllers\StaffPenerimaanController;
use App\Http\Controllers\StafPenyaluranPkhController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('staffdesa/layouts/app');

// Route::get('/penerimaan', [PkhPenerimaConttoller::class, 'index'])->name('penerimaan.index');
Route::get('/pkh/penerima', [PkhPenerimaController::class, 'index'])->name('pkh.menerima');

Route::get('/salur', [CetakSalurController::class, 'index'])->name('cetak.index');
Route::get('/', [MasyarakatController::class, 'index'])->name('home');
Route::post('home/cari', [MasyarakatController::class, 'cari'])->name('cari');
Route::get('/masyarakat/pengumuman', 'MasyarakatController@pengumuman')->name('masyarakat.pengumuman');

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/penerima-not-in-penyaluran', [StafPenyaluranController::class, 'penerimaNotInPenyaluran']);

// route::get('generate-pdf', [GeneratePDfPkhController::class, 'genetatePdf']);
// route::get('generate-pdf', [GeneratePDfPkhController::class, 'genetatePdf']);



Route::middleware('userAkses:1')->group(function () {
    Route::get('/staf/dashboard', [StafController::class, 'index'])->name('staf.dashboard')->middleware('userAkses:1');
    //pengajuan
    Route::get('/staf/pengajuan', [StafPengajuanController::class, 'index'])->name('staf.pengajuan')->middleware('userAkses:1');
    route::get('/staf/pengajuan/create', [StafPengajuanController::class, 'create'])->name('pengajuan.staf.create');
    route::post('/staf/pengajuan', [StafPengajuanController::class, 'store'])->name('pengajuan.staf.store');
    Route::get('/staf/pengajuan/cetak', [StafPengajuanController::class, 'cetakPdf'])->name('staf.pengajuan.cetak')->middleware('userAkses:1');
    // Route::post('/staf/pengajuan/update-status', [StafPengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');
    Route::get('/staf/pengajuan/detail/{id}', [StafPengajuanController::class, 'detail'])->name('staff.pengajuan.detail');
    route::get('/staf/pengajuan/edit/{id}', [StafPengajuanController::class, 'edit'])->name('pengajuan.staf.edit');
    route::put('/staf/pengajuan/{id}', [StafPengajuanController::class, 'update'])->name('pengajuan.staf.update');
    Route::get('/staf/pengajuan/{id}', [StafPengajuanController::class, 'destroy'])->name('pengajuan.staf.destroy');
    Route::post('/staf/pengajuan/update-status', [StafPengajuanController::class, 'updateStatus'])->name('pengajuan.updateStatus');

    //pengguna
    Route::get('/staf/pengguna', [PenggunaController::class, 'index'])->name('staf.pengguna');
    Route::get('/staf/pengguna/create', [PenggunaController::class, 'create'])->name('staf.pengguna.create');
    Route::post('/staf/pengguna/', [PenggunaController::class, 'store'])->name('staf.pengguna.store');
    Route::get('/staf/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('staf.pengguna.edit');
    Route::put('/staf/pengguna/{id}', [PenggunaController::class, 'update'])->name('staf.pengguna.update');
    Route::get('/staf/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
    //penerimaan
    Route::get('/staf/penerimaan', [StaffPenerimaanController::class, 'index'])->name('staf.penerimaan')->middleware('userAkses:1');
    Route::get('/staf/penerimaan/create', [StaffPenerimaanController::class, 'create'])->name('penerimaan.create')->middleware('userAkses:1');
    Route::post('/staf/penerimaan', [StaffPenerimaanController::class, 'store'])->name('penerimaan.store')->middleware('userAkses:1');
    Route::get('/staf/penerimaan/edit/{id}', [StaffPenerimaanController::class, 'edit'])->name('penerima.edit')->middleware('userAkses:1');
    Route::put('/staf/penerimaan/{id}', [StaffPenerimaanController::class, 'update'])->name('penerima.update')->middleware('userAkses:1');
    Route::get('/staf/penerimaan/{id}', [StaffPenerimaanController::class, 'destroy'])->name('penerima.destroy');
    Route::get('/staf/penerimaan/cetak', [StaffPenerimaanController::class, 'cetakPdf'])->name('cetak.penerimaan.blt');
    Route::get('/staf/penerimaan/pdf', [StaffPenerimaanController::class, 'export'])->name('penerima.blt.cetak.pdf');
    Route::get('/staf/penerimaan/detail/{id}', [StaffPenerimaanController::class, 'detail'])->name('staf.penerimablt.detail');
    route::get('/staf/cetak-blt', [GeneratePDfPkhController::class, 'generatePdfBlt'])->name('blt.cetak');
    // pkh
    Route::get('/staf/penerimapkh/', [StafPkhController::class, 'index'])->name('penerima.pkh')->middleware('userAkses:1');
    Route::get('/staf/penerimapkh/create/', [StafPkhController::class, 'create',])->name('create.penerima.pkh')->middleware('userAkses:1');
    Route::post('/staf/penerimapkh', [StafPkhController::class, 'store',])->name('store.penerima.pkh')->middleware('userAkses:1');
    // Route::put('/staf/penerimapkh/{id}', [StafPkhController::class, 'update',])->name('update.penerima.pkh')->middleware('userAkses:1');
    Route::put('/staf/penerimapkh/{id}', [StafPkhController::class, 'update'])->name('update.penerima.pkh')->middleware('userAkses:1');
    Route::get('/staf/penerimapkh/edit/{id}', [StafPkhController::class, 'edit',])->name('edit.penerima.pkh')->middleware('userAkses:1');
    Route::put('/staf/penerimapkh/{id}', [StafPkhController::class, 'update'])->name('update.penerima.pkh');
    Route::get('/staf/penerimapkh/{id}', [StafPkhController::class, 'destroy'])->name('destroy.penerima.pkh');
    Route::get('/staf/penerimapkh/detail/{id}', [StafPkhController::class, 'detail'])->name('detail.penerima.pkh');
    // route::get('/staf/cetak-pkh', [GeneratePDfPkhController::class, 'genetatePdfPkh'])->name('pkh.cetak');
    route::get('/staf/cetak-pkh-tampil', [GeneratePDfPkhController::class, 'generatePdfPkhTAmpil'])->name('pkh.cetak.tampil');



    // penyaluran pkh
    Route::get('/staf/penyaluran/pkh', [StafPenyaluranPkhController::class, 'index'])->name('penyaluran.pkh');
    route::get('/staf/penyaluran/pkh/cetak', [CetakSalurController::class, 'cetaksalurpkh'])->name('penyaluran.pkh.cetak');
    Route::post('staf/penyaluran/pkh/store', [StafPenyaluranPkhController::class, 'store'])->name('tambah.pkh');
    Route::put('staf/penyaluran/pkh/{id}', [StafPenyaluranPkhController::class, 'update'])->name('update.penyaluran.pkh');
    Route::get('/staf/penyaluran/{id}/edit', [StafPenyaluranPkhController::class, 'edit'])->name('pkh.penyaluran.edit');
    route::get('/staf/penyaluranpkh/cetak/belum', [GeneratePDfPkhController::class, 'pkhbelum'])->name('penyaluran.pkh.cetak.belum');
    Route::get('/staff/penyaluranpkh/{id}', [StafPenyaluranPkhController::class, 'destroy'])->name('penyaluran.destroy.pkh');




    //Penyaluran
    route::get('/staf/penyaluran', [StafPenyaluranController::class, 'index'])->name('penyaluran');
    route::get('/staf/penyaluran/cetak', [CetakSalurController::class, 'cetaksalurblt'])->name('penyaluran.cetak');
    route::get('/staf/halo', [StafPenyaluranController::class, 'hallo'])->name('penyaluran.cetak');
    route::get('/staf/penyaluran/create', [StafPenyaluranController::class, 'create'])->name('penyaluran.create');
    route::post('/staf/penyaluran/store', [StafPenyaluranController::class, 'store'])->name('penyaluran.store');
    // Route::get('/staf/penyaluran/{id}', [StafPenyaluranController::class, 'destroy'])->name('penyaluran.destroy');
    route::get('/staf/penyaluran/cetak/belum', [GeneratePDfPkhController::class, 'bltbelum'])->name('penyaluran.pkh.cetak.belum');



    // route::get('/staf/penyaluran/{id_penyaluran}', [StafPenyaluranController::class, 'edit'])->name('penyaluran.edit');
    // route::post('/staf/penyaluran/update/{id_penyaluran}', [StafPenyaluranController::class, 'update'])->name('penyaluran.update');

    Route::get('/staf/penyaluran/{id}/edit', [StafPenyaluranController::class, 'edit'])->name('penyaluran.edit');
    Route::put('/staf/penyaluran/{id}', [StafPenyaluranController::class, 'update'])->name('penyaluran.update');
    Route::get('/staf/penyaluran/{id}', [StafPenyaluranController::class, 'destroy'])->name('penyaluran.destroy');

    //persyaratan
    Route::get('/staf/persyaratan', [PersyaratanstafController::class, 'index'])->name('persyaratan');
    route::post('/staf/persyaratan/store', [PersyaratanstafController::class, 'store'])->name('persyaratan.store');
    Route::get('/staf/persyaratan/{id}/edit', [PersyaratanstafController::class, 'edit'])->name('persyaratan.edit');
    Route::put('/staf/persyaratan/{id}', [PersyaratanstafController::class, 'update'])->name('persyaratan.update');
    Route::get('/staf/persyaratan/{id}', [PersyaratanstafController::class, 'destroy'])->name('persayratan.destroy');

    //pengumuman
    Route::get('/staf/pengumuman', [PengumummanController::class, 'index'])->name("pengumuman");
    route::post('/staf/pengumuman/store', [PengumummanController::class, 'store'])->name('pengumuman.store');
    Route::get('/staf/pengumuman/{id}/edit', [PengumummanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/staf/pengumuman/{id}', [PengumummanController::class, 'update'])->name('pengumuman.update');
    Route::get('/staf/pengumuman/{id}', [PengumummanController::class, 'destroy'])->name('pengumuman.destroy');
});

Route::middleware('userAkses:2')->group(function () {
    //pkh
    Route::get('/pkh/dashboard', [PkhDashboardController::class, 'index'])->name('pkh.dashboard');
    // Route::get('/pkh/penerima', [PkhPenerimaController::class, 'index'])->name('pkh.menerima');
    Route::post('/pkh/penerima/store', [PkhPenerimaController::class, 'store'])->name('pkh.store');
    Route::get('/pkh/penerima/create', [PkhPenerimaController::class, 'create'])->name('pkh.create');
    Route::get('pkh/penerima/edit/{id}', [PkhPenerimaController::class, 'edit'])->name('pkh.edit');
    Route::put('/pkh/penerima/{id}', [PkhPenerimaController::class, 'update'])->name('pkh.update');
    Route::get('/pkh/penerima/{id}', [PkhPenerimaController::class, 'destroy'])->name('pkh.destroy.pkh');
    // route::get('/pkh/penerima/cetak', [GeneratePkhController::class, 'generatePdfPkh'])->name('pkh.cetak');
    // Route::get('/pkh/penerima/cetak', [GeneratePkhController::class, 'generatePdfPkh'])->name('pkh.cetak');
    route::get('/pkh/cetak-pkh-tampil', [PkhPenerimaController::class, 'generatePdfPkhTAmpil'])->name('pkh.tampil');







    // penyaluran
    Route::get('pkh/penyaluran', [PkhPenyaluranController::class, 'index'])->name('pkh.penyaluran');
    Route::Post('pkh/penyaluran/store', [PkhPenyaluranController::class, 'store'])->name('pkh.penyaluran.store');
    // Route::Post('pkh/penyaluran/{id}', [PkhPenyaluranController::class, 'update'])->name('pkh.penyaluran.store');
    Route::get('/pkh/penyaluran/{id}/edit', [PkhPenyaluranController::class, 'edit'])->name('pkh.penyaluran.edit');
    Route::put('pkh/penyaluran/{id}', [PkhPenyaluranController::class, 'update'])->name('pkh.penyaluran.update');
    Route::get('/pkh/penyaluran/{id}', [PkhPenyaluranController::class, 'destroy'])->name('pkh.penyaluran.destroy');
    // Route::delete('/pkh/penyaluran/{id}', [PkhPenyaluranController::class, 'destroy'])->name('pkh.penyaluran.destroy');
});

Route::middleware('userAkses:3')->group(function () {
    //dashboard
    route::get('/rt/dashboard', [RtDashboardController::class, 'index'])->name('dashboard.rt');
    route::get('/rt/pengajuan', [RtPengajuanController::class, 'index'])->name('pengajuan.rt');
    route::get('/rt/pengajuan/create', [RtPengajuanController::class, 'create'])->name('pengajuan.rt.create');
    route::post('/rt/pengajuan', [RtPengajuanController::class, 'store'])->name('pengajuan.rt.store');
    route::get('/rt/pengajuan/edit/{id}', [RtPengajuanController::class, 'edit'])->name('pengajuan.rt.edit');
    route::put('/rt/pengajuan/{id}', [RtPengajuanController::class, 'update'])->name('pengajuan.rt.update');
    Route::get('/rt/pengajuan/{id}', [RtPengajuanController::class, 'destroy'])->name('pengajuan.destroy');
    Route::get('/rt/detail/{id}', [RtPengajuanController::class, 'detail'])->name('pengajuan.detail');
    // Route::get('/rt/detail', [RtPengajuanController::class, 'detail'])->name('pengajuan.detail');

    //lihat bantunan
    route::get('/rt/penerima/bltdd', [RtPenerimaan::class, 'bltdd'])->name('penerima.blt');
    route::get('/rt/penerima/pkh', [RtPenerimaan::class, 'pkh'])->name('penerima.pkh.rt');

    //lihat penyaluran bantuan
    route::get('/rt/penyaluran/bltdd', [RtPenyaluran::class, 'bltdd'])->name('rt.penyaluran.bltdd');
    route::get('/rt/penyaluran/pkh', [RtPenyaluran::class, 'pkh'])->name('rt.penyaluran.pkh');

    //lihat persyaratan bltdd
    route::get('/rt/persyaratan', [RtPersyaratanController::class, 'index'])->name('persyatan.rt');
});
