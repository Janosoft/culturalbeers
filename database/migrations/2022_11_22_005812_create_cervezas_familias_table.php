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
        Schema::create('cervezas_familias', function (Blueprint $table) {
            $table->id('familia_id');
            $table->string('nombre', 100)->unique();
            $table->foreignId('fermento_id')->constrained('cervezas_fermentos','fermento_id');
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
        Schema::dropIfExists('cervezas_familias');
    }
};
