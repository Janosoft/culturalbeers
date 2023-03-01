<?php

namespace Database\Factories;

use App\Models\Continente;
use App\Models\DivisionesPoliticasTipo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pais>
 */
class PaisFactory extends Factory
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
            'continente_id' => Continente::all()->random()->continente_id,
            'divisiones_politicas_tipo_id' => DivisionesPoliticasTipo::all()->random()->divisiones_politicas_tipo_id,
            'slug' => str()->slug($nombre, '-', 'es'),
            'user_id' => User::all()->random()->user_id,
        ];
    }
}
