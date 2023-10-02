<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'nombre_rol'=>'Administrador',
            'permiso_id_permisos'=>'1',
        ]);
        Rol::create([
            'nombre_rol'=>'Peticiones',
            'permiso_id_permisos'=>'2',
        ]);
        Rol::create([
            'nombre_rol'=>'AdministradorContratos',
            'permiso_id_permisos'=>'3',
        ]);

    }
}
