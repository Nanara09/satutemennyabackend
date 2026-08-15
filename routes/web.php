<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;

Route::get('/portofolio', [PortofolioController::class, 'index'])
    ->name('portofolio.index');

    Route::get('/portofolio/{skill}', [PortofolioController::class, 'skill'])
    ->name('portfolio.detail');