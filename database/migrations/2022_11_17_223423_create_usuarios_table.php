<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usuario_id');
            $table->foreignId('persona_id')->constrained('personas','persona_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('email_visible')->default(false);
            $table->timestamp('email_verificado')->nullable();
            $table->boolean('activado')->default(false);
            $table->boolean('bloqueado')->default(false);
            $table->string('slug');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
