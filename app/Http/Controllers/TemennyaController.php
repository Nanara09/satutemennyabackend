<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemennyaController extends Controller
{
    public function index(){
        return view('temennyaview');
    }
    public function temen($temen){
    
    return view('TemenViewnya', compact('temen'));
    }
    
}
