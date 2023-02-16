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
        Schema::create('lugares', function (Blueprint $table) {
            $table->id('lugar_id');
            $table->string('nombre', 100);
            $table->foreignId('categoria_id')->constrained('lugares_categorias', 'categoria_id');
            $table->foreignId('localidad_id')->constrained('localidades', 'localidad_id');
            $table->string('direccion', 100);
            $table->string('imagen_id')->nullable();
            $table->string('slug');
            $table->boolean('verificado')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['nombre', 'localidad_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugares');
    }
};
