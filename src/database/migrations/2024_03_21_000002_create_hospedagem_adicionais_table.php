<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hospedagem_adicionais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospedagem_id')->constrained()->onDelete('cascade');
            $table->foreignId('adicional_id')->constrained()->onDelete('cascade');
            $table->decimal('valor', 10, 2);
            $table->integer('quantidade')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospedagem_adicionais');
    }
}; 