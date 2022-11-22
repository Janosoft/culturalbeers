<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Continente::factory(10)->create();
        \App\Models\DivisionesPoliticasTipo::factory(10)->create();
        \App\Models\Pais::factory(50)->create();
        \App\Models\DivisionPolitica::factory(10)->create();
        \App\Models\Localidad::factory(50)->create();
        \App\Models\Persona::factory(30)->create();
        \App\Models\Usuario::factory(30)->create();
        \App\Models\CervezasEnvase::factory(30)->create();
        \App\Models\ProductoresFabricacion::factory(30)->create();
        \App\Models\Productor::factory(30)->create();
        \App\Models\CervezasColor::factory(30)->create();
        \App\Models\CervezasFermento::factory(30)->create();
        \App\Models\CervezasFamilia::factory(30)->create();
        \App\Models\CervezasEstilo::factory(30)->create();
        \App\Models\Cerveza::factory(30)->create();
    }
}
