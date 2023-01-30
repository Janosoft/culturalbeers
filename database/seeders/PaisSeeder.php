<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Pais;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = Pais::factory(30)->create();
        foreach ($paises as $pais) {
            Imagen::factory(1)->create([
                'imageable_id' => $pais->pais_id,
                'imageable_type' => Pais::class,
                'usuario_id' => 1, //TODO poner el usuario
            ]);
        }
    }
}
