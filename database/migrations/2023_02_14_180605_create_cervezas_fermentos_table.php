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
        Schema::create('cervezas_fermentos', function (Blueprint $table) {
            $table->id('fermento_id');
            $table->string('nombre', 100)->unique();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('cervezas_fermentos');
    }
};
