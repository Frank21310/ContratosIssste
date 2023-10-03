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
        Schema::create('detallerequesiciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requesicion_id_requesicion')
            ->references('id_requesicion')
            ->on('requesiciones');
            $table->bigInteger('num_partida');
            $table->foreignId('cucop')
            ->references('id_cucop')
            ->on('Cucops');
            $table->string('descripcion');
            $table->float('cantidad');
            $table->float('unidad_medida');
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
        Schema::dropIfExists('detallerequesiciones');
    }
};
