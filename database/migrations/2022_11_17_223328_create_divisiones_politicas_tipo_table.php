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
        Schema::create('divisiones_politicas_tipos', function (Blueprint $table) {
            $table->id("division_politica_tipo_id");
            $table->foreignId("pais_id")->constrained("paises","pais_id");
            $table->string('nombre', 50)->unique();
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
        Schema::dropIfExists('divisiones_politicas_tipos');
    }
};
