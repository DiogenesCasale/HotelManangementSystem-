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
        Schema::table('tblHospedagem', function (Blueprint $table) {
            $table->foreign(['idPessoa'])->references(['id'])->on('tblPessoa')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idQuarto'])->references(['id'])->on('tblQuarto')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idTarifa'])->references(['id'])->on('tblTarifa')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idUsuario'])->references(['id'])->on('tblUsuario')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idVenda'])->references(['id'])->on('tblVenda')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblHospedagem', function (Blueprint $table) {
            $table->dropForeign('tblhospedagem_idpessoa_foreign');
            $table->dropForeign('tblhospedagem_idquarto_foreign');
            $table->dropForeign('tblhospedagem_idtarifa_foreign');
            $table->dropForeign('tblhospedagem_idusuario_foreign');
            $table->dropForeign('tblhospedagem_idvenda_foreign');
        });
    }
};
