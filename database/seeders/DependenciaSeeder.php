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
        Dependencia::create([
            'nombre'=>'Hospital Regional Presidente Juárez',
            'domicilio'=>' Gerardo Varela 617, Lomas del Creston, 68024 Oaxaca de Juárez, Oax.',
        ]);
        Dependencia::create([
            'nombre'=>'ISSSTE Clínica de Medicina Familiar Con Especialidades y Quirófano Oaxaca',
            'domicilio'=>'Blvd. Eduardo Vasconcelos N° 615, Centro, 68000 Oaxaca de Juárez, Oax.',
        ]);
        Dependencia::create([
            'nombre'=>'ISSSTE Clínica Médica Familia',
            'domicilio'=>'Arteaga 119, OAX_RE_BENITO JUAREZ, Centro, 68000 Oaxaca de Juárez, Oax.',
        ]);
        Dependencia::create([
            'nombre'=>'Subdelegación de Prestaciones Issste',
            'domicilio'=>'C. de Gardenias 613-Interior Sn, Reforma, 68050 Oaxaca de Juárez, Oax.',
        ]);

    }
}
