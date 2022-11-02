<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermisosRolProfesionalSaludSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::find(2)
            ->givePermissionTo(
                [
                    'administracion-modulo',
                    'clinicax-leer',
                    'paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar',
                    'formular-leer', 'formular-crear', 'formular-editar', 'formular-borrar',
                    'cmedicame-leer', 'formular-copiar', 'usuarios-polidato'
                ]
            );
    }
}
