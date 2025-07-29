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
        Schema::table('tblVenda', function (Blueprint $table) {
            $table->foreign(['idPessoa'])->references(['id'])->on('tblPessoa')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idUsuario'])->references(['id'])->on('tblUsuario')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblVenda', function (Blueprint $table) {
            $table->dropForeign('tblvenda_idpessoa_foreign');
            $table->dropForeign('tblvenda_idusuario_foreign');
        });
    }
};
