<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Localidad>
 */
class LocalidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = fake()->unique()->word();
        return [
            'nombre' => $nombre,
            'division_politica_id' => fake()->numberBetween(1, 10),
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
