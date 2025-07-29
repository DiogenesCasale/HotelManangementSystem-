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
        Schema::create('tblUsuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idPessoa')->index('tblusuario_idpessoa_foreign');
            $table->string('login')->unique();
            $table->string('senha');
            $table->unsignedBigInteger('idPermissao');
            $table->integer('status')->default(1);
            $table->timestamp('dataCadastro')->useCurrent();
            $table->timestamp('dataAtualizacao')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblUsuario');
    }
};
