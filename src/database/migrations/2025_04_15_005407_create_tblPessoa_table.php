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
        Schema::create('tblPessoa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomePessoa');
            $table->string('apelido')->nullable();
            $table->string('cpf_cnpj')->unique();
            $table->date('dataNascimento');
            $table->decimal('saldo', 10)->default(0);
            $table->string('status');
            $table->timestamp('dataCadastro')->useCurrent();
            $table->timestamp('dataAtualizacao')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblPessoa');
    }
};
