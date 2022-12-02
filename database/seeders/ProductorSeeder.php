<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Productor;
use App\Models\Imagen;

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
