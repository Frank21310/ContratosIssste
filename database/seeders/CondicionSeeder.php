<?php

namespace Database\Seeders;

use App\Models\Condicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Condicion::create([
            'nombre_condicion'=>'Una solo Exhibicion',
        ]);
        Condicion::create([
            'nombre_condicion'=>'Entregas Parciales',
        ]);
        Condicion::create([
            'nombre_condicion'=>'Otro',
        ]);
    }
}
