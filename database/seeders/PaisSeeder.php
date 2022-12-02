<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imagen;
use App\Models\Pais;

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
            ]);
        }
    }
}
