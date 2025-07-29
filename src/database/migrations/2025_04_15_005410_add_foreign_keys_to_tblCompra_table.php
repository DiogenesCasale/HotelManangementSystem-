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
        Schema::table('tblCompra', function (Blueprint $table) {
            $table->foreign(['idUsuario'])->references(['id'])->on('tblUsuario')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblCompra', function (Blueprint $table) {
            $table->dropForeign('tblcompra_idusuario_foreign');
        });
    }
};
