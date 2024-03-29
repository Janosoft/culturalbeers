<?php

namespace Database\Factories;

use App\Models\Pais;
use App\Models\User;
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
        $nombre = implode(' ', fake()->unique()->words(2));

        return [
            'pais_id' => Pais::all()->random()->pais_id,
            'nombre' => $nombre,
            'descripcion' => fake()->paragraph(),
            'slug' => str()->slug($nombre, '-', 'es'),
            'user_id' => User::all()->random()->user_id,
        ];
    }
}
