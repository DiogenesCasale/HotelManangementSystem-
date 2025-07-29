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
        Schema::create('tblHospedagem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idUsuario')->index('tblhospedagem_idusuario_foreign');
            $table->unsignedBigInteger('idPessoa')->index('tblhospedagem_idpessoa_foreign');
            $table->unsignedBigInteger('idQuarto')->index('tblhospedagem_idquarto_foreign');
            $table->unsignedBigInteger('idVenda')->index('tblhospedagem_idvenda_foreign');
            $table->unsignedBigInteger('idTarifa')->index('tblhospedagem_idtarifa_foreign');
            $table->decimal('valorHospedagem', 10);
            $table->dateTime('dataInicio');
            $table->dateTime('dataFim');
            $table->timestamp('dataCadastro')->useCurrent();
            $table->timestamp('dataAtualizacao')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblHospedagem');
    }
};
