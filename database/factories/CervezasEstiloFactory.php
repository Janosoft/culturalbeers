<?php

namespace Database\Factories;

use App\Models\CervezasFamilia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasEstilo>
 */
class CervezasEstiloFactory extends Factory
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
            'familia_id' => CervezasFamilia::all()->random()->familia_id,
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
