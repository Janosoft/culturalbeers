<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id('pais_id');
            $table->string('nombre', 100)->unique();
            $table->foreignId('continente_id')->constrained('continentes', 'continente_id');
            $table->foreignId('divisiones_politicas_tipo_id')->constrained('divisiones_politicas_tipos', 'divisiones_politicas_tipo_id');
            $table->string('imagen_id')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paises');
    }
};
