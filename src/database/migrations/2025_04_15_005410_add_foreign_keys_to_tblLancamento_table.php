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
        Schema::table('tblLancamento', function (Blueprint $table) {
            $table->foreign(['idCompra'])->references(['id'])->on('tblCompra')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idConta'])->references(['id'])->on('tblConta')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idUsuario'])->references(['id'])->on('tblUsuario')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idVenda'])->references(['id'])->on('tblVenda')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblLancamento', function (Blueprint $table) {
            $table->dropForeign('tbllancamento_idcompra_foreign');
            $table->dropForeign('tbllancamento_idconta_foreign');
            $table->dropForeign('tbllancamento_idusuario_foreign');
            $table->dropForeign('tbllancamento_idvenda_foreign');
        });
    }
};
