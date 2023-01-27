<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cervezas', function (Blueprint $table) {
            $table->id('cerveza_id');
            $table->string('nombre', 100);
            $table->tinyInteger('IBU');
            $table->unsignedDecimal('ABV', 2, 1);
            $table->foreignId('productor_id')->constrained('productores', 'productor_id');
            $table->foreignId('color_id')->constrained('cervezas_colores', 'color_id');
            $table->foreignId('estilo_id')->constrained('cervezas_estilos', 'estilo_id');
            $table->string('imagen_id')->nullable();
            $table->string('slug');
            $table->timestamps();

            $table->unique(['nombre', 'productor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cervezas');
    }
};
