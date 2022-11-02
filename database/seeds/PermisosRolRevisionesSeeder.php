<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermisosRolRevisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::find(3)
            ->givePermissionTo(
                [
                    'produccion-modulo', 'usuarios-polidato',
                    'revision-leer', 'revision-crear', 'revision-editar', 'revision-borrar',
                    'cerliblo-leer'
                ]
            );
    }
}
