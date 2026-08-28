<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard(){
    $data = [
    ["nama" => "Alya Putri", "kelas" => "XI TKJ 1", "jurusan" => "TKJ"],
    ["nama" => "Bagas Ramadhan", "kelas" => "XI TKJ 2", "jurusan" => "TKJ"],
    ["nama" => "Citra Lestari", "kelas" => "XI TKJ 1", "jurusan" => "TKJ"],
    ["nama" => "Daffa Akbar", "kelas" => "XI TKJ 2", "jurusan" => "TKJ"],
    ["nama" => "Fajar Nugraha", "kelas" => "XI TKJ 1", "jurusan" => "TKJ"],
    ["nama" => "Gina Maharani", "kelas" => "XI TKJ 2", "jurusan" => "TKJ"],
    ["nama" => "Hana Safitri", "kelas" => "XI TKJ 1", "jurusan" => "TKJ"],
    ["nama" => "Iqbal Maulana", "kelas" => "XI TKJ 2", "jurusan" => "TKJ"],
    ["nama" => "Nabila Salsabila", "kelas" => "XI TKA 1", "jurusan" => "TKA"],
    ["nama" => "Rizky Firmansyahh", "kelas" => "XI TKP 2", "jurusan" => "TKP"]
];

    return view('ViewDashboard', compact('data'));
    }
}
