<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cerveza;
use App\Models\CervezasColor;
use App\Models\CervezasEnvaseTipo;
use App\Models\CervezasEstilo;
use App\Models\Productor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cerveza>
 */
class CervezaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = implode(" ", fake()->unique()->words(2));
        $productor = Productor::all()->random();
        return [
            'nombre' => $nombre,
            'productor_id' => $productor->productor_id,
            'color_id' => CervezasColor::all()->random()->color_id,
            'estilo_id' => CervezasEstilo::all()->random()->estilo_id,
            'slug' => str()->slug($productor->nombre . '-' . $nombre, '-', 'es'),
        ];
    }
}
