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
        Schema::create('personas', function (Blueprint $table) {
            $table->id('persona_id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('profesion', 100)->nullable();
            $table->foreignId('localidad_id')->constrained('localidades','localidad_id');
            $table->string('imagen')->nullable();
            $table->string('slug');
            $table->timestamps();

            $table->index('nombre');
            $table->index('apellido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
