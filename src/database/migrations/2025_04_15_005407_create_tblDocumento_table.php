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
        Schema::create('tblDocumento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idPessoa')->index('tbldocumento_idpessoa_foreign');
            $table->string('tipo');
            $table->string('documento');
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
        Schema::dropIfExists('tblDocumento');
    }
};
