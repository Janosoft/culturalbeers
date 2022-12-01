<?php

namespace Database\Factories;

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
            'localidad_id' => fake()->numberBetween(1, 10),
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
