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
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->bigIncrements('id_requisicion');
            $table->foreignId('dependencia_id_dependencia')
            ->references('id_dependencia')
            ->on('dependencias');
            $table->foreignId('area_id_area')
            ->references('id_area')
            ->on('areas');
            $table->date('fecha_elaboracion');
            $table->bigInteger('no_requesicion');
            $table->date('fecha_requerida');
            $table->string('lugar_entrega');
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
            $table->string('autoriza');
            $table->foreignId('estado')
            ->references('id_estado')
            ->on('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisiciones');
    }
};
