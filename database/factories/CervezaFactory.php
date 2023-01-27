<?php

namespace Database\Factories;

use App\Models\CervezasColor;
use App\Models\CervezasEstilo;
use App\Models\Productor;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $nombre = implode(' ', fake()->unique()->words(2));
        $productor = Productor::all()->random();

        return [
            'nombre' => $nombre,
            'IBU' => fake()->numberBetween(10, 90),
            'ABV' => fake()->randomFloat(1, 5, 30),
            'productor_id' => $productor->productor_id,
            'color_id' => CervezasColor::all()->random()->color_id,
            'estilo_id' => CervezasEstilo::all()->random()->estilo_id,
            'slug' => str()->slug($productor->nombre . '-' . $nombre, '-', 'es'),
        ];
    }
}
