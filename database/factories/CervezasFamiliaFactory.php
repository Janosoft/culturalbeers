<?php

namespace Database\Factories;

use App\Models\CervezasFermento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasFamilia>
 */
class CervezasFamiliaFactory extends Factory
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
            'descripcion' => fake()->paragraph(),
            'fermento_id' => CervezasFermento::all()->random()->fermento_id,
            'slug' => str()->slug($nombre, '-', 'es'),
            'user_id' => User::all()->random()->user_id,
        ];
    }
}
