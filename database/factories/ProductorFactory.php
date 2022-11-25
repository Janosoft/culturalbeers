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
        $nombre = implode(" ", fake()->unique()->words(2));
        return [
            'nombre' => $nombre,
            'fabricacion_id' => fake()->numberBetween(1, 3),
            'localidad_origen' => fake()->numberBetween(1, 10),
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
