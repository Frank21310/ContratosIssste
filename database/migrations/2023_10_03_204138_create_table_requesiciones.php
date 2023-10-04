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
        Schema::create('requesiciones', function (Blueprint $table) {
            $table->bigIncrements('id_requesicion');
            $table->foreignId('dependencia_id_dependencia')
            ->references('id_dependencia')
            ->on('dependencias');
            $table->foreignId('area_id_area')
            ->references('id_area')
            ->on('areas');
            $table->date('fecha_elaboracion');
            $table->bigInteger('no_requesicion');
            $table->date('fecha_requerida');
            $table->float('otros_gravamientos');
            $table->float('total');
            $table->string('anexos');
            $table->string('aticipos');
            $table->string('autorizacion_presupuesto');
            $table->boolean('existencia_almacen');
            $table->string('observaciones');
            $table->string('registro_sanitario');
            $table->string('normas');
            $table->boolean('capacitacion');
            $table->foreignId('pais_id_pais')
            ->references('id_pais')
            ->on('paises');
            $table->foreignId('metodos_id_metodos')
            ->references('id_metodos')
            ->on('metodos');
            $table->foreignId('garantia_id_garantia')
            ->references('id_garantia')
            ->on('garantias');
            $table->string('porcentaje');
            $table->boolean('pluralidad');
            $table->boolean('penas_convencionales');
            $table->string('tiempo_fabricacion');
            $table->foreignId('condicion_id_condicion')
            ->references('id_condicion')
            ->on('condiciones');
            $table->foreignId('solicita')
            ->references('num_empleado')
            ->on('empleados');
            $table->foreignId('autoriza')
            ->references('num_empleado')
            ->on('empleados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requesiciones');
    }
};
