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
        Schema::create('insumos_cucop', function (Blueprint $table) {
            $table->string('cucop');
            $table->foreignId('id_partida_especifica_id')
            ->references('id_partida_especifica')
            ->on('partidas_cucop'); 
            $table->id('clave_cucop');
            $table->string('descripcion_insumo');
            $table->string('CABM');
            $table->string('tipo_contratacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos_cucop');
    }
};
