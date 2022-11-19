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
        Schema::create('paises', function (Blueprint $table) {
            $table->id('pais_id');
            $table->string('nombre', 100)->unique();
            $table->foreignId('continente_id')->constrained('continentes','continente_id');
            $table->foreignId('division_politica_tipo_id')->constrained('divisiones_politicas_tipos','division_politica_tipo_id');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('paises');
    }
};
