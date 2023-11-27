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
        Schema::create('archivosrequisicion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requisicion_id')
            ->references('id_requisicion')
            ->on('requisiciones');
            $table->string('name');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivosrequisicion');
    }
};
