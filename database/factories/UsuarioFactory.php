<?php

namespace Database\Factories;

use App\Models\Persona;
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
        $email = fake()->unique()->safeEmail();

        return [
            'persona_id' => Persona::all()->random()->persona_id,
            'email' => $email,
            'password' => fake()->md5(),
            'email_visible' => fake()->boolean(),
            'email_verificado' => fake()->dateTime(),
            'activado' => fake()->boolean(),
            'bloqueado' => fake()->boolean(),
            'remember_token' => Str::random(10),
            'slug' => md5($email),
        ];
    }
}
