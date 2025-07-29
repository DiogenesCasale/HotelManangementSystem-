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
        Schema::table('tblTelefone', function (Blueprint $table) {
            $table->foreign(['idPessoa'])->references(['id'])->on('tblPessoa')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblTelefone', function (Blueprint $table) {
            $table->dropForeign('tbltelefone_idpessoa_foreign');
        });
    }
};
