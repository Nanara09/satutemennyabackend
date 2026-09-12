<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KimpulModel;

class KimpulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KimpulModel::factory(10)->create();
    }
}
