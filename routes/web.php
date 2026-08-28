<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TemennyaController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\DashboardController;

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