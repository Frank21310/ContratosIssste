<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dependencia;

class DependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        Dependencia::create([
            'nombre'=>'Delegacion Estatal ISSSTE Oaxaca',
            'domicilio'=>'Calle Amapolas #100, Reforma, 68050, Oaxaca de Juarez, Oax.',
        ]);
    }
}
