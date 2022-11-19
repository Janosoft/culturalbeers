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
            'password' => fake()->password(),
            'email_visible' => fake()->numberBetween(1,10),
            'email_verificado' => fake()->dateTime(),
            'activado' => fake()->numberBetween(1,10),
            'bloqueado' => fake()->numberBetween(1,10),
            'remember_token' => Str::random(10),
        ];
    }
}
