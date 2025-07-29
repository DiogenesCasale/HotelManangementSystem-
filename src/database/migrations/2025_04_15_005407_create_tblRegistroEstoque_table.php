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
        Schema::create('tblRegistroEstoque', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idProduto')->index('tblregistroestoque_idproduto_foreign');
            $table->unsignedBigInteger('idUsuario')->index('tblregistroestoque_idusuario_foreign');
            $table->unsignedBigInteger('idCompra')->nullable()->index('tblregistroestoque_idcompra_foreign');
            $table->enum('tipo', ['ENTRADA', 'SAIDA']);
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
        Schema::dropIfExists('tblRegistroEstoque');
    }
};
