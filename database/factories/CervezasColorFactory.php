<?php

namespace Database\Factories;

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
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
