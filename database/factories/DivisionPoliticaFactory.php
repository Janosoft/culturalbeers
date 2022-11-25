<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DivisionPolitica>
 */
class DivisionPoliticaFactory extends Factory
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
            'pais_id' => fake()->numberBetween(1, 10),
            'nombre' => $nombre,
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
