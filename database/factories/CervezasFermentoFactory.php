<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CervezasFermento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CervezasFermento>
 */
class CervezasFermentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => implode(" ", fake()->unique()->words(2)),
        ];
    }
}
