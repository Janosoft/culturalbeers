<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Productor;
use Illuminate\Database\Seeder;

class ProductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productores = Productor::factory(30)->create();
        foreach ($productores as $productor) {
            Imagen::factory(1)->create([
                'imageable_id' => $productor->productor_id,
                'imageable_type' => Productor::class,
            ]);
        }
    }
}
