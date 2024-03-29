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
        Schema::create('cervezas_familias', function (Blueprint $table) {
            $table->id('familia_id');
            $table->string('nombre', 100)->unique();
            $table->text('descripcion')->nullable();
            $table->foreignId('fermento_id')->constrained('cervezas_fermentos', 'fermento_id');
            $table->string('slug');
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
        Schema::dropIfExists('cervezas_familias');
    }
};
