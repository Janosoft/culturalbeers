<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasFamilia>
 */
class CervezasFamiliaFactory extends Factory
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
            'fermento_id' => CervezasFermento::all()->random()->fermento_id,
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
