<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CervezasFamilia;

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
            'fermento_id' => fake()->numberBetween(1,10),
            'slug' => str()->slug($nombre, '-', 'es'),
        ];
    }
}
