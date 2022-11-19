<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'persona_id' => fake()->numberBetween(1,10),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->md5(),
            'email_visible' => fake()->boolean(),
            'email_verificado' => fake()->dateTime(),
            'activado' => fake()->boolean(),
            'bloqueado' => fake()->boolean(),
            'remember_token' => Str::random(10),
        ];
    }
}
