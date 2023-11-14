<?php

namespace Database\Seeders;

use App\Models\Unidad_medida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unidad_medida::create([
            'descripcion_unidad'=>'Servicio',
        ]);
        Unidad_medida::create([
            'descripcion_unidad'=>'Pieza',
        ]);
        Unidad_medida::create([
            'descripcion_unidad'=>'Kilogramo',
        ]);
        Unidad_medida::create([
            'descripcion_unidad'=>'Litro',
        ]);

    }
}
