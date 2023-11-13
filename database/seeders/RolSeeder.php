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
            'nombre_rol'=>'Requirente',
            'permiso_id_permisos'=>'2',
        ]);
        Rol::create([
            'nombre_rol'=>'Contratante',
            'permiso_id_permisos'=>'3',
        ]);
        Rol::create([
            'nombre_rol'=>'AdminContratos',
            'permiso_id_permisos'=>'3',
        ]);
        Rol::create([
            'nombre_rol'=>'finanzas',
            'permiso_id_permisos'=>'3',
        ]);
        Rol::create([
            'nombre_rol'=>'areanormativa',
            'permiso_id_permisos'=>'3',
        ]);

    }
}
