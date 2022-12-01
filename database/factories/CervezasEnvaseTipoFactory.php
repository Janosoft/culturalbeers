<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CervezasEnvaseTipo;

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
        $nombre = implode(" ", fake()->unique()->words(2));
        return [
            'nombre' => $nombre,
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}