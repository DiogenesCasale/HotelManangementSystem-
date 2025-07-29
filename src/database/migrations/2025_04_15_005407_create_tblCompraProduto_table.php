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
        Schema::create('tblCompraProduto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idProduto')->index('tblcompraproduto_idproduto_foreign');
            $table->unsignedBigInteger('idFornecedor')->index('tblcompraproduto_idfornecedor_foreign');
            $table->integer('qtd');
            $table->decimal('valorUnitario', 10);
            $table->decimal('valorTotal', 10);
            $table->timestamp('dataCadastro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblCompraProduto');
    }
};
