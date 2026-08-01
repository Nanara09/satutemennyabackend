<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function() {
    echo "<h1>Hello world !!</h1>";
});

Route::get('/hi', [HelloController:: class, 'index']);