<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CervezasEstilo;
use App\Models\CervezasFamilia;

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
        $nombre = implode(" ", fake()->unique()->words(2));
        return [
            'nombre' => $nombre,
            'familia_id' => CervezasFamilia::all()->random()->familia_id,
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
