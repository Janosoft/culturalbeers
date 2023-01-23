<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personas = Persona::factory(30)->create();
        foreach ($personas as $persona) {
            Imagen::factory(1)->create([
                'imageable_id' => $persona->persona_id,
                'imageable_type' => Persona::class,
            ]);
        }
    }
}
