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
        Schema::table('tblRegistroEstoque', function (Blueprint $table) {
            $table->foreign(['idCompra'])->references(['id'])->on('tblCompra')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idProduto'])->references(['id'])->on('tblProduto')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idUsuario'])->references(['id'])->on('tblUsuario')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblRegistroEstoque', function (Blueprint $table) {
            $table->dropForeign('tblregistroestoque_idcompra_foreign');
            $table->dropForeign('tblregistroestoque_idproduto_foreign');
            $table->dropForeign('tblregistroestoque_idusuario_foreign');
        });
    }
};
