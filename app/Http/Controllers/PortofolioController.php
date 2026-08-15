<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
{
    $nama = 'Nisriina Gede Rizq Annaafi';
    $bio  = 'Programming';
    return view('portofolio.index',
        compact('nama', 'bio'));
}
public function skill($skill)
{
    return view('portofolio.skill', compact('skill'));
}
}



