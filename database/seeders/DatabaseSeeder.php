<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dependencia;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermisosSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(DependenciaSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        $this->call(MetodoSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(GarantiaSeeder::class);
        $this->call(CondicionSeeder::class);
        $this->call(EstadoSeeder::class);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
