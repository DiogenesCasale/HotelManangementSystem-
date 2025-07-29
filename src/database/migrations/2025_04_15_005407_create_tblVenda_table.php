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
        Schema::create('tblVenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idUsuario')->index('tblvenda_idusuario_foreign');
            $table->unsignedBigInteger('idPessoa')->index('tblvenda_idpessoa_foreign');
            $table->decimal('valorTotal', 10);
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
        Schema::dropIfExists('tblVenda');
    }
};
