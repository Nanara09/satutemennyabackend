<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class KimpulModelFactory extends Factory
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
            'age'=> fake() ->numberBetween(10,20),
            'major'=> fake() ->words(5, true),
            'hobby'=> fake() ->words(5, true),
        ];
    }
}
