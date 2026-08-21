<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function toko(){
    return view('TokoView');
    }
    public function cabang($cabang){
    
    return view('CabangToko', compact('cabang'));
    }
    
}
