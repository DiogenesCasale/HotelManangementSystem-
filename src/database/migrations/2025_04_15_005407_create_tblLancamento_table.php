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
        Schema::create('tblLancamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idUsuario')->index('tbllancamento_idusuario_foreign');
            $table->unsignedBigInteger('idConta')->index('tbllancamento_idconta_foreign');
            $table->unsignedBigInteger('idCompra')->nullable()->index('tbllancamento_idcompra_foreign');
            $table->unsignedBigInteger('idVenda')->nullable()->index('tbllancamento_idvenda_foreign');
            $table->string('descricao');
            $table->enum('tipo', ['ENTRADA', 'SAIDA']);
            $table->enum('status', ['PENDENTE', 'LANCADO', 'CANCELADO']);
            $table->decimal('valor', 10);
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
        Schema::dropIfExists('tblLancamento');
    }
};
