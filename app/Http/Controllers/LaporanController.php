<?php

namespace App\Http\Controllers;

use App\Models\Departemen;


class LaporanController extends Controller
{
    public function index()
    {
        $departemens = Departemen::withCount('pegawais')->get();
        return view('laporan', compact('departemens'));
    }
}
