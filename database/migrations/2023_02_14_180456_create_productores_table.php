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
        Schema::create('productores', function (Blueprint $table) {
            $table->id('productor_id');
            $table->string('nombre', 100)->unique();
            $table->text('descripcion')->nullable();
            $table->foreignId('fabricacion_id')->constrained('productores_fabricaciones', 'fabricacion_id');
            $table->foreignId('localidad_id')->constrained('localidades', 'localidad_id');
            $table->string('imagen_id')->nullable();
            $table->string('slug');
            $table->boolean('verificado')->default(false);
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productores');
    }
};
