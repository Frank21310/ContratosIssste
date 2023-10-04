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
            'email'=>'administrador@admin.com',
            'password'=>Hash::make('admin'),
            'rol_id'=>'1',
        ]);
        $useradmin=User::create([
            'empleado_num'=>'19920153',
            'email'=>'alicegarciapacheco@gmail.com',
            'password'=>Hash::make('alis1234'),
            'rol_id'=>'2',
        ]);
        User::create([
            'empleado_num'=>'00000001',
            'email'=>'admin@contratos.com',
            'password'=>Hash::make('admin'),
            'rol_id'=>'2',
        ]);
    }
}
