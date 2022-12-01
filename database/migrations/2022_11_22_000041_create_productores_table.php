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
        Schema::create('productores', function (Blueprint $table) {
            $table->id('productor_id');
            $table->string('nombre', 100)->unique();
            $table->foreignId('fabricacion_id')->constrained('productores_fabricaciones', 'fabricacion_id');
            $table->foreignId('localidad_id')->constrained('localidades','localidad_id');
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
        Schema::dropIfExists('productores');
    }
};
