<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermisosRolControTerminadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::find(6)
            ->givePermissionTo(
                [
                    'produccion-modulo', 'usuarios-polidato',
                    'controlt-leer', 'controlt-crear', 'controlt-editar', 'controlt-borrar',
                ]
            );
    }
}
