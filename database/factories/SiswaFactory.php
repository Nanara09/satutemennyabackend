<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake() ->words(5, true),
            'no_absen'=> fake() ->numberBetween(10,20),
            'jurusan'=> fake() ->words(5, true),
            'kelas'=> fake() ->words(5, true),
            'alamat'=> fake() ->words(5, true),
        ];
    }
}
