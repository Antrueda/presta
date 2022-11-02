<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermisosRolPreparacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::find(4)
            ->givePermissionTo(
                [
                    'produccion-modulo', 'usuarios-polidato',
                    'preparac-leer', 'preparac-crear', 'preparac-editar', 'preparac-borrar',
                ]
            );
    }
}
