<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'super-administrador',]); // 1
        Role::create(['name' => 'profesional-salud',]); // 2
        Role::create(['name' => 'Revisiones',]); // 3
        Role::create(['name' => 'Preparaciones',]); // 4
        Role::create(['name' => 'Control-Proceso',]); // 5
        Role::create(['name' => 'Control-Terminado',]); // 6
    }
}
