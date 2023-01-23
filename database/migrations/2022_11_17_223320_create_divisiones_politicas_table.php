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
        Schema::create('divisiones_politicas', function (Blueprint $table) {
            $table->id('division_politica_id');
            $table->foreignId('pais_id')->constrained('paises', 'pais_id');
            $table->string('nombre');
            $table->string('slug');
            $table->timestamps();

            $table->index('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisiones_politicas');
    }
};
