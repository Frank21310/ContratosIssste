<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;


class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::create([
            'num_empleado'=>'19920182',
            'nombre'=>'Francisco Daniel',
            'apellido_paterno'=>'Santaella',
            'apellido_materno'=>'Ruiz',
            'cargo_id_cargo'=>'1',
            'dependencia_id_dependencia'=>'1',
        ]);
        Empleado::create([
            'num_empleado'=>'19920153',
            'nombre'=>'Alicia',
            'apellido_paterno'=>' Garcia ',
            'apellido_materno'=>'Pacheco',
            'cargo_id_cargo'=>'2',
            'dependencia_id_dependencia'=>'1',
        ]);
    }
}
