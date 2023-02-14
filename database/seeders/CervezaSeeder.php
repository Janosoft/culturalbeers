<?php

namespace Database\Seeders;

use App\Models\Cerveza;
use App\Models\CervezasEnvaseTipo;
use App\Models\Comentario;
use App\Models\Imagen;
use Illuminate\Database\Seeder;

class CervezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cervezas = Cerveza::factory(5)->create();
        foreach ($cervezas as $cerveza) {
            Imagen::factory(1)->create([
                'imageable_id' => $cerveza->cerveza_id,
                'imageable_type' => Cerveza::class,
                'usuario_id' => 1, //TODO poner el usuario
            ]);
            Comentario::factory(2)->create([
                'commentable_id' => $cerveza->cerveza_id,
                'commentable_type' => Cerveza::class,
                'usuario_id' => 1, //TODO poner el usuario
            ]);
            $cerveza->envases()->sync([CervezasEnvaseTipo::all()->random()->envase_id]);
        }
    }
}
