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
        Schema::create('tblVendaItem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idProduto')->index('tblvendaitem_idproduto_foreign');
            $table->decimal('valorUnitario', 10);
            $table->integer('qtd');
            $table->timestamp('dataCadastro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblVendaItem');
    }
};
