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
        Schema::create('tblHospedagemAdicional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idHospedagem')->index('tblhospedagemadicional_idhospedagem_foreign');
            $table->unsignedBigInteger('idAdicional')->index('tblhospedagemadicional_idadicional_foreign');
            $table->timestamp('dataCadastro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblHospedagemAdicional');
    }
};
