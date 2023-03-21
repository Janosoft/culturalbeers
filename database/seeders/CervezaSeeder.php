<?php

namespace Database\Seeders;

use App\Models\Cerveza;
use App\Models\CervezasEnvaseTipo;
use App\Models\Comentario;
use App\Models\Imagen;
use App\Models\User;
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
        $cervezas = Cerveza::factory(10)->create();
        foreach ($cervezas as $cerveza) {
            Imagen::factory(1)->create([
                'imageable_id' => $cerveza->cerveza_id,
                'imageable_type' => Cerveza::class,
                'user_id' => User::all()->random()->user_id,
            ]);
            Comentario::factory(2)->create([
                'commentable_id' => $cerveza->cerveza_id,
                'commentable_type' => Cerveza::class,
                'user_id' => User::all()->random()->user_id,
            ]);
            $cerveza->envases()->sync([CervezasEnvaseTipo::all()->random()->envase_id]);
        }
    }
}
