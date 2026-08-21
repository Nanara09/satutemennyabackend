<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function biodata(){
        return view ('BiodataView');
    }
    public function alamat($alamat){
    
    return view('AlamatBiodata', compact('alamat'));
    }
    
}
