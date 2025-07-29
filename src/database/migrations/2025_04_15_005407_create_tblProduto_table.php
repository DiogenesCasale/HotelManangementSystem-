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
        Schema::create('tblProduto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomeProduto');
            $table->string('codBarra')->unique();
            $table->decimal('valorCompra', 10);
            $table->integer('qtdAtual');
            $table->integer('qtdMinima');
            $table->string('status');
            $table->text('observacao')->nullable();
            $table->timestamp('dataCadastro')->useCurrent();
            $table->timestamp('dataAtualizacao')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblProduto');
    }
};
