<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake() ->word(3, true),
            'price' => fake() ->NumberBetween (
                5000, 150000),
            'stock' => fake() ->numberBetween(0,50),
        ];
    }
}
