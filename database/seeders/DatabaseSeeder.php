<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('imagenes');
        Storage::makeDirectory('imagenes');

        \App\Models\Continente::factory(10)->create();
        \App\Models\DivisionesPoliticasTipo::factory(10)->create();
        $this->call(PaisSeeder::class);
        \App\Models\DivisionPolitica::factory(10)->create();
        \App\Models\Localidad::factory(50)->create();
        \App\Models\CervezasEnvaseTipo::factory(10)->create();
        \App\Models\ProductoresFabricacion::factory(3)->create();
        $this->call(ProductorSeeder::class);
        \App\Models\CervezasColor::factory(10)->create();
        \App\Models\CervezasFermento::factory(10)->create();
        \App\Models\CervezasFamilia::factory(30)->create();
        \App\Models\CervezasEstilo::factory(30)->create();
        $this->call(CervezaSeeder::class);
        $this->call(PersonaSeeder::class);
        \App\Models\Usuario::factory(30)->create();
    }
}
