<?php

namespace Database\Factories;

use App\Models\Localidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = fake()->name();

        return [
            'nombre' => $nombre,
            'apellido' => fake()->lastname(),
            'profesion' => rtrim(fake()->sentence(2), '.'),
            'localidad_id' => Localidad::all()->random()->localidad_id,
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
