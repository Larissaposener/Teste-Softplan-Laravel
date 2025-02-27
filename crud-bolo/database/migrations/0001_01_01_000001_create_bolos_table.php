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
        Schema::create('bolos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('peso', 10, 2);  
            $table->decimal('valor', 10, 2);  
            $table->integer('quantidade_disponivel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('bolos');
    }
        
};
