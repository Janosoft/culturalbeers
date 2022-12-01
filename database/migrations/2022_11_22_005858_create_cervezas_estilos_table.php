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
        Schema::create('cervezas_estilos', function (Blueprint $table) {
            $table->id('estilo_id');
            $table->string('nombre', 100)->unique();
            $table->foreignId('familia_id')->constrained('cervezas_familias','familia_id');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cervezas_estilos');
    }
};
