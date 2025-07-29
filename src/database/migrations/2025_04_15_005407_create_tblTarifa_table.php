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
        Schema::create('tblTarifa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor', 10);
            $table->string('descricao');
            $table->text('observacao')->nullable();
            $table->string('status');
            $table->timestamp('dataCadastro')->useCurrent();
            $table->timestamp('dataAtualizacao')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblTarifa');
    }
};
