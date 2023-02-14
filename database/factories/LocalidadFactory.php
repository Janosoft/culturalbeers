<?php

namespace Database\Factories;

use App\Models\DivisionPolitica;
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
            'division_politica_id' => DivisionPolitica::all()->random()->division_politica_id,
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
