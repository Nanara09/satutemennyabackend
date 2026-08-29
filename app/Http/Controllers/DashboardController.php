<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $data = [
            ['nama' => 'keyboard', 'deskripsi' => 'keyboard murah', 'harga' => '500000', 'jumlah' => '100'],
            ['nama' => 'mouse', 'deskripsi' => 'mouse murah', 'harga' => '90000', 'jumlah' => '100'],
            ['nama' => 'monitor', 'deskripsi' => 'monitor murah', 'harga' => '3000000', 'jumlah' => '100'],
            ['nama' => 'laptop', 'deskripsi' => 'laptop murah', 'harga' => '5000000', 'jumlah' => '100'],
            ['nama' => 'LAN', 'deskripsi' => 'LAN murah', 'harga' => '100000', 'jumlah' => '100'],
            ['nama' => 'Crimping', 'deskripsi' => 'Crimping murah', 'harga' => '1000000', 'jumlah' => '100'],
        ];

        //1 data bebas
        $produk = [
            ['nama' => 'sabun colek', 'deskripsi' => 'sabun colek murah', 'harga' => '5000', 'jumlah' => '10'],
            ['nama' => 'sabun cair', 'deskripsi' => 'sabun cair murah', 'harga' => '3000', 'jumlah' => '5'],
            ['nama' => 'sabun batang', 'deskripsi' => 'sabun batang murah', 'harga' => '3000', 'jumlah' => '5'],
            ['nama' => 'sikat gigi', 'deskripsi' => 'sikat gigi murah', 'harga' => '5000', 'jumlah' => '5'],
            ['nama' => 'shampo', 'deskripsi' => 'Shampo murah', 'harga' => '500', 'jumlah' => '10'],
            ['nama' => 'odol', 'deskripsi' => 'odol murah', 'harga' => '5000', 'jumlah' => '10'],
            ['nama' => 'minyak', 'deskripsi' => 'miyak murah', 'harga' => '10000', 'jumlah' => '50'],
            ['nama' => 'gas', 'deskripsi' => 'gas murah', 'harga' => '25000', 'jumlah' => '100'],
            ['nama' => 'piring', 'deskripsi' => 'piring murah', 'harga' => '100000', 'jumlah' => '150'],
            ['nama' => 'gelas', 'deskripsi' => 'gelas murah', 'harga' => '100000', 'jumlah' => '160'],
        ];

        return view('viewdashboard', compact('data'), compact('produk'));
    }
}

