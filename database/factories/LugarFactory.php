<?php

namespace Database\Factories;

use App\Models\Localidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lugar>
 */
class LugarFactory extends Factory
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
            'localidad_id' => Localidad::all()->random()->localidad_id,
            'direccion' => implode(' ', fake()->unique()->words(2)) . ' ' . fake()->RandomNumber(3, false),
            'slug' => str()->slug($nombre, '-', 'es'),
            'verificado' => false,
        ];
    }
}
