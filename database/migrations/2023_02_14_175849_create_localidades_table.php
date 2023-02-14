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
        Schema::create('localidades', function (Blueprint $table) {
            $table->id('localidad_id');
            $table->string('nombre', 50);
            $table->foreignId('division_politica_id')->constrained('divisiones_politicas', 'division_politica_id');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();

            $table->index('nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localidades');
    }
};
