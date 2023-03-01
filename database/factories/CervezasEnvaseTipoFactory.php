<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasEnvase>
 */
class CervezasEnvaseTipoFactory extends Factory
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
            'nombre' => $nombre,
            'slug' => str()->slug($nombre, '-', 'es'),
            'user_id' => User::all()->random()->user_id,
        ];
    }
}
