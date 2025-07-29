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
        Schema::table('tblCompraProduto', function (Blueprint $table) {
            $table->foreign(['idFornecedor'])->references(['id'])->on('tblFornecedor')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idProduto'])->references(['id'])->on('tblProduto')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblCompraProduto', function (Blueprint $table) {
            $table->dropForeign('tblcompraproduto_idfornecedor_foreign');
            $table->dropForeign('tblcompraproduto_idproduto_foreign');
        });
    }
};
