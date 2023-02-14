<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Lugar;
use Illuminate\Database\Seeder;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lugares = Lugar::factory(30)->create();
        foreach ($lugares as $lugar) {
            Imagen::factory(1)->create([
                'imageable_id' => $lugar->lugar_id,
                'imageable_type' => Lugar::class,
                'usuario_id' => 1, //TODO poner el usuario
            ]);
        }
    }
}
