<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cerveza;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cerveza>
 */
class CervezaFactory extends Factory
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
            'productor_id' => fake()->numberBetween(1,10),
            'color_id' => fake()->numberBetween(1,10),
            'estilo_id' => fake()->numberBetween(1,10),
        ];
    }
}