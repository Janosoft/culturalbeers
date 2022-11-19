<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pais>
 */
class PaisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->unique()->sentence(1),
            'continente_id' => fake()->numberBetween(1,10),
            'division_politica_tipo_id' => fake()->numberBetween(1,10),
        ];
    }
}
