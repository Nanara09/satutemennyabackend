<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departemen;

class DepartemenSeeder extends Seeder
{
    public function run(): void
    {
        Departemen::create([
            'nama_departemen' => 'Keuangan',
        ]);

        Departemen::create([
            'nama_departemen' => 'IT',
        ]);

        Departemen::create([
            'nama_departemen' => 'HRD',
        ]);
    }
}