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
        Schema::create('interessados_bolo', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB'; // Define o mecanismo para InnoDB
            $table->foreignId('interessados_id')->constrained('interessados')->onDelete('cascade');
            $table->foreignId('bolo_id')->constrained('bolos')->onDelete('cascade');
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
        Schema::dropIfExists('usuario_bolo');
        //Schema::dropIfExists('interessados_bolo'); 
    }
};