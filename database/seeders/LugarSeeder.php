<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Lugar;
use App\Models\User;
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
                'user_id' => User::all()->random()->user_id,
            ]);
        }
    }
}
