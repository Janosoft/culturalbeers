<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CervezasEstilo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasEstilo>
 */
class CervezasEstiloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => implode(" ", fake()->unique()->words(2)),
            'familia_id' => fake()->numberBetween(1,10),
        ];
    }
}
