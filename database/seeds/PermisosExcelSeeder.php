<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisosExcelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // crear para clinicas
        Permission::create(['name' => 'excelxxx-moduloxx',  'descripc' => 'Habilita los permisos para el módulo de excel']);
        // condiciones del los rangos
        $permiso = 'nutrelab';
        Permission::create(['name' => $permiso . '-leerxxxx',  'descripc' => 'Ver el reporte excel para Informe Nutriciones elaboradas']);
        Permission::create(['name' => $permiso . '-imprimir',  'descripc' => 'Imprimir el reporte excel para Informe Nutriciones elaboradas']);

        $permiso = 'infoclin';
        Permission::create(['name' => $permiso . '-leerxxxx',  'descripc' => 'Ver el reporte excel para Informe por clinica']);
        Permission::create(['name' => $permiso . '-imprimir',  'descripc' => 'Imprimir el reporte excel para Informe por clinica']);

        $permiso = 'infopaci';
        Permission::create(['name' => $permiso . '-leerxxxx',  'descripc' => 'Ver el reporte excel para Informe por paciente']);
        Permission::create(['name' => $permiso . '-imprimir',  'descripc' => 'Imprimir el reporte excel para Informe por paciente']);

        $permiso = 'consmedi';
        Permission::create(['name' => $permiso . '-leerxxxx',  'descripc' => 'Ver el reporte excel para Informe de salida de consumo de medicamentos']);
        Permission::create(['name' => $permiso . '-imprimir',  'descripc' => 'Imprimir el reporte excel para Informe de salida de consumo de medicamentos']);
    }
}
