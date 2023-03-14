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
        Schema::create('puntajes', function (Blueprint $table) {
            $table->id('puntaje_id');
            $table->unsignedBigInteger('puntuable_id');
            $table->string('puntuable_type');
            $table->smallInteger('puntaje');
            $table->foreignId('user_id')->constrained('users', 'user_id');

            $table->unique(['puntuable_id', 'puntuable_type', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntajes');
    }
};
