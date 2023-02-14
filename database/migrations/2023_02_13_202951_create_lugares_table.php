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
        Schema::create('lugares', function (Blueprint $table) {
            $table->id('lugar_id');
            $table->string('nombre', 100);
            $table->foreignId('localidad_id')->constrained('localidades', 'localidad_id');
            $table->string('direccion', 100);
            $table->string('imagen_id')->nullable();
            $table->string('slug');
            $table->boolean('verificado')->default(false);
            $table->timestamps();

            $table->unique(['nombre', 'localidad_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugares');
    }
};
