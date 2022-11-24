<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Productor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productor>
 */
class ProductorFactory extends Factory
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
            'fabricacion_id' => fake()->numberBetween(1, 3),
            'localidad_origen' => fake()->numberBetween(1, 10),
        ];
    }
}
