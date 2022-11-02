<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermisosRolControlProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::find(5)
            ->givePermissionTo(
                [
                    'produccion-modulo', 'usuarios-polidato',
                    'controlp-leer', 'controlp-crear', 'controlp-editar', 'controlp-borrar',
                ]
            );
    }
}
