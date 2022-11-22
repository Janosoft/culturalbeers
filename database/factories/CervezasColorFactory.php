<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CervezasColor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasColor>
 */
class CervezasColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->unique()->word(),
        ];
    }
}
