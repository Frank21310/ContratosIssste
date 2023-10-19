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
        Schema::create('detallerequisiciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('requisicion_id')
            ->references('id_requisicion')
            ->on('requisiciones');

            $table->foreignId('num_partida')
            ->references('id_partida_especifica')
            ->on('partidas_cucop');

            $table->foreignId('cucop')
            ->references('id_cucop')
            ->on('insumos_cucop');

            $table->string('descripcion');
            $table->float('cantidad');

            $table->foreignId('unidad_medida')
            ->references('idunidad_medida')
            ->on('unidad_medida');

            $table->float('precio');
            $table->float('importe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallerequisiciones');
    }
};
