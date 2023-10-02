<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permisos;


class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permisos::create([
            'nombre_permiso'=>'SuperUser',
        ]);
        Permisos::create([
            'nombre_permiso'=>'Crear Peticion',
        ]);
        Permisos::create([
            'nombre_permiso'=>'Modificar Peticion',
        ]);
        Permisos::create([
            'nombre_permiso'=>'Eliminar Peticion',
        ]);
    }
}
