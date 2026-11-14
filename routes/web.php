<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TemennyaController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JenisBukuController;
use App\Http\Controllers\DataBukuController;

Route::get('/portofolio', [PortofolioController::class, 'index'])
    ->name('portofolio.index');

    Route::get('/portofolio/{skill}', [PortofolioController::class, 'skill'])
    ->name('portfolio.detail');

Route::get('/temennya',[TemennyaController::class,'index']);
Route::get('/biodata',[BiodataController::class,'biodata']);
Route::get('/toko',[TokoController::class,'toko']);
Route::get('/toko/{cabang}',[TokoController::class,'cabang']);
Route::get('/biodata/{alamat}',[BiodataController::class,'alamat']);
Route::get('/temennya/{temen}',[TemennyaController::class,'temen']);
Route::get('/dashboard',[DashboardController::class,'dashboard']);
Route::post('/barang/add', [BarangController::class, 'store'])->name('barang.kirim');
Route::get('/barang/add', [BarangController::class, 'store_view'])->name('barang.tambah');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/update/{id}', [BarangController::class, 'update_view'])->name('barang.edit');
Route::get('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/siswa/add', [SiswaController::class, 'store'])->name('siswa.kirim');
Route::get('/siswa/add', [SiswaController::class, 'store_view'])->name('siswa.tambah');
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/update/{id}', [SiswaController::class, 'update_view'])->name('siswa.edit');
Route::get('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/buku/add', [BukuController::class, 'store'])->name('buku.kirim');
Route::get('/buku/add', [BukuController::class, 'store_view'])->name('buku.tambah');
Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::get('/buku/update/{id}', [BukuController::class, 'update_view'])->name('buku.edit');
Route::get('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.delete');
Route::get('/buku', [BukuController::class, 'index']);
Route::resource('pegawai', PegawaiController::class);
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');

Route::get('/jenis-buku', [JenisBukuController::class, 'index']);
Route::post('/jenis-buku', [JenisBukuController::class, 'store']);
Route::put('/jenis-buku/{id}', [JenisBukuController::class, 'update']);
Route::delete('/jenis-buku/{id}', [JenisBukuController::class, 'destroy']);
Route::get('/data-jenis-buku', [JenisBukuController::class, 'getData']);
Route::get('/data-buku', [DataBukuController::class, 'getData']);
Route::get('/buku', [DataBukuController::class, 'index']);
Route::post('/buku', [DataBukuController::class, 'store']);
Route::put('/buku/{id}', [DataBukuController::class, 'update']);
Route::delete('/buku/{id}', [DataBukuController::class, 'destroy']);
Route::get('/buku/create', [DataBukuController::class, 'create']);
Route::get('/buku/{id}/edit', [DataBukuController::class, 'edit']);

Route::get('/data-buku-server', [DataBukuController::class, 'getDataServerSide']);

