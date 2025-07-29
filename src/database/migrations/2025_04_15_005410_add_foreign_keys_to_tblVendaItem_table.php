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
        Schema::table('tblVendaItem', function (Blueprint $table) {
            $table->foreign(['idProduto'])->references(['id'])->on('tblProduto')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblVendaItem', function (Blueprint $table) {
            $table->dropForeign('tblvendaitem_idproduto_foreign');
        });
    }
};
