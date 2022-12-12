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
        Schema::create('cervezas_envases', function (Blueprint $table) {
            $table->foreignId('cerveza_id')->constrained('cervezas','cerveza_id')->onDelete('cascade');
            $table->foreignId('envase_id')->constrained('cervezas_envases_tipos','envase_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cervezas_envases');
    }
};
