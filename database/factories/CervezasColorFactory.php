<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasColor>
 */
class CervezasColorFactory extends Factory
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
            'color' => fake()->hexColor(),
            'slug' => str()->slug($nombre, '-', 'es'),
            'user_id' => User::all()->random()->user_id,
        ];
    }
}
