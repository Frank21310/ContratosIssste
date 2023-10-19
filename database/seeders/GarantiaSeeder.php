<?php

namespace Database\Seeders;

use App\Models\Garantia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GarantiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Garantia::create([
            'nombre_garantia'=>'Garantia de Licitacion',
        ]);
        Garantia::create([
            'nombre_garantia'=>'Garantia de cumplimiento',
        ]);
        Garantia::create([
            'nombre_garantia'=>'Garantia de mantenimiento',
        ]);
        Garantia::create([
            'nombre_garantia'=>'Garantia de pago anticipado',
        ]);
        Garantia::create([
            'nombre_garantia'=>'Garantia de pago',
        ]);
        Garantia::create([
            'nombre_garantia'=>'Garantia de retencion de fondos',
        ]);
    }
}
