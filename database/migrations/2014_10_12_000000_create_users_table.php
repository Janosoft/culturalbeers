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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('blocked')->default(false);
            $table->string('slug');
            $table->rememberToken();
            $table->timestamps();

            /* TODO MIGRAR DESDE PERSONAS
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('profesion', 100)->nullable();
            $table->foreignId('localidad_id')->constrained('localidades', 'localidad_id');
            $table->string('imagen_id')->nullable();

            $table->index('nombre');
            $table->index('apellido');


            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
