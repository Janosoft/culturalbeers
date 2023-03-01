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
            $table->id('user_id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->unsignedBigInteger('localidad_id')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('imagen_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('blocked')->default(false);
            $table->string('slug');
            $table->rememberToken();
            $table->timestamps();

            $table->index('nombre');
            $table->index('apellido');
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
