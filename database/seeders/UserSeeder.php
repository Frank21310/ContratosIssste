<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $useradmin=User::create([
            'empleado_num'=>'19920182',
            'email'=>'administrador@issste.com.mx',
            'password'=>Hash::make('admin'),
            'rol_id'=>'1',
        ]);
        $useradmin=User::create([
            'empleado_num'=>'19920153',
            'email'=>'alice@issste.com.mx',
            'password'=>Hash::make('alis'),
            'rol_id'=>'2',
        ]);
        $useradmin=User::create([
            'empleado_num'=>'19920182',
            'email'=>'contratante@issste.com.mx',
            'password'=>Hash::make('contratante'),
            'rol_id'=>'3',
        ]);
        $useradmin=User::create([
            'empleado_num'=>'19920153',
            'email'=>'admincontratos@issste.com.mx',
            'password'=>Hash::make('admincontratos'),
            'rol_id'=>'4',
        ]);
        $useradmin=User::create([
            'empleado_num'=>'19920182',
            'email'=>'finanzas@issste.com.mx',
            'password'=>Hash::make('finanzas'),
            'rol_id'=>'5',
        ]);
        $useradmin=User::create([
            'empleado_num'=>'19920153',
            'email'=>'area@issste.com.mx',
            'password'=>Hash::make('area'),
            'rol_id'=>'6',
        ]);
    }
}
