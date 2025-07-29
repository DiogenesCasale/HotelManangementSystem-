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
        Schema::table('tblHospedagemAdicional', function (Blueprint $table) {
            $table->foreign(['idAdicional'])->references(['id'])->on('tblAdicional')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idHospedagem'])->references(['id'])->on('tblHospedagem')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblHospedagemAdicional', function (Blueprint $table) {
            $table->dropForeign('tblhospedagemadicional_idadicional_foreign');
            $table->dropForeign('tblhospedagemadicional_idhospedagem_foreign');
        });
    }
};
