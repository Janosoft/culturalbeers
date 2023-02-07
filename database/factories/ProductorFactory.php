<?php

namespace Database\Factories;

use App\Models\Localidad;
use App\Models\ProductoresFabricacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productor>
 */
class ProductorFactory extends Factory
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
            'fabricacion_id' => ProductoresFabricacion::all()->random()->fabricacion_id,
            'localidad_id' => Localidad::all()->random()->localidad_id,
            'slug' => str()->slug($nombre, '-', 'es'),
            'verificado' => false,
        ];
    }
}
