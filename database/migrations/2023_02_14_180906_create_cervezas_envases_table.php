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
        Schema::create('cervezas_envases', function (Blueprint $table) {
            $table->foreignId('cerveza_id')->constrained('cervezas', 'cerveza_id')->onDelete('cascade');
            $table->foreignId('envase_id')->constrained('cervezas_envases_tipos', 'envase_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cervezas_envases');
    }
};
