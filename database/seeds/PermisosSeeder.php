<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
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
        Permission::create(['name' => 'administracion-modulo',  'descripc' => 'Habilita los permisos para el módulo de administración']);
        // condiciones del los rangos
        $permiso = 'npt';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar npts']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear npt']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar npt']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar npt']);

        $permiso = 'rnpt';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar npts del rango']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear npt del rango']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar npt del rango']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar npt del rango']);
        $permiso = 'rcondici';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar Condiciones del rango']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear Condiciones del rango']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar Condiciones del rango']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar Condiciones del rango']);
        $permiso = 'rcodigo';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar Códigos de la condición']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear Código de la condición']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar Código de la condición']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar Código de la condición']);
        $permiso = 'usuarios';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar usuarios']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear usuario']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar usuario']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar usuario']);
        Permission::create(['name' => $permiso . '-polidato',  'descripc' => 'Aceptar las políticas de datos']);
        /**
         * permisos para las unidades
         */
        $permiso = 'rangonpt';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar unidad npts']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear unidad npt']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar unidad npt']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar unidad npt']);
        $permiso = 'unidad';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar unidades']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear unidad']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar unidad']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar unidad']);
        $permiso = 'urango';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar unidad rangos']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear unidad rango']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar unidad rango']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar unidad rango']);
        $permiso = 'urnpt';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar unidad npts']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear unidad npt']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar unidad npt']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar unidad npt']);



        /**
         * permisos para clinicas
         */
        Permission::create(['name' => 'clinicax-leer',  'descripc' => 'Listar clínicas']);
        Permission::create(['name' => 'clinicax-crear',  'descripc' => 'Crear clínica']);
        Permission::create(['name' => 'clinicax-editar',  'descripc' => 'Editar clínica']);
        Permission::create(['name' => 'clinicax-borrar',  'descripc' => 'Inactivar clínica']);
        /**
         * permisos para sucurdales
         */
        Permission::create(['name' => 'sisclini-leer',  'descripc' => 'Listar Sucursales']);
        Permission::create(['name' => 'sisclini-crear',  'descripc' => 'Crear Sucursal']);
        Permission::create(['name' => 'sisclini-editar',  'descripc' => 'Editar Sucursal']);
        Permission::create(['name' => 'sisclini-borrar',  'descripc' => 'Inactivar Sucursal']);

        Permission::create(['name' => 'cmedicame-asiganar',  'descripc' => 'Permite asignar medicamentos a una clínica']);
        Permission::create(['name' => 'cmedicame-leer',  'descripc' => 'Listar medicamentos clínica']);
        Permission::create(['name' => 'cmedicame-crear',  'descripc' => 'Asignar medicamento clínica']);
        Permission::create(['name' => 'cmedicame-editar',  'descripc' => 'Editar medicamento clínica']);
        Permission::create(['name' => 'cmedicame-borrar',  'descripc' => 'Inactivar medicamento clínica']);

        Permission::create(['name' => 'cpaciente-asiganar',  'descripc' => 'Permite asignar pacientes a una clínica']);
        Permission::create(['name' => 'cpaciente-leer',  'descripc' => 'Listar pacientes clínica']);
        Permission::create(['name' => 'cpaciente-crear',  'descripc' => 'Asignar paciente clínica']);
        Permission::create(['name' => 'cpaciente-editar',  'descripc' => 'Editar paciente clínica']);
        Permission::create(['name' => 'cpaciente-borrar',  'descripc' => 'Inactivar paciente clínica']);

        Permission::create(['name' => 'crango-asiganar',  'descripc' => 'Permite asignar rangos a una clínica']);
        Permission::create(['name' => 'crango-leer',  'descripc' => 'Listar rangos clínica']);
        Permission::create(['name' => 'crango-crear',  'descripc' => 'Asignar rango a clínica']);
        Permission::create(['name' => 'crango-editar',  'descripc' => 'Editar rango a clínica']);
        Permission::create(['name' => 'crango-borrar',  'descripc' => 'Inactivar rango a clínica']);


        Permission::create(['name' => 'cremision-leer',  'descripc' => 'Listar remisiones clínica']);
        Permission::create(['name' => 'cremision-crear',  'descripc' => 'Asignar remisiones a clínica']);
        Permission::create(['name' => 'cremision-editar',  'descripc' => 'Editar remisiones a clínica']);
        Permission::create(['name' => 'cremision-borrar',  'descripc' => 'Inactivar remisiones a clínica']);



        /**
         * medicamentos
         */
        Permission::create(['name' => 'medicamento-modulo',  'descripc' => 'Habilita los permisos para el módulo de medicamentos']);

        Permission::create(['name' => 'casa-leer',  'descripc' => 'Listar casas']);
        Permission::create(['name' => 'casa-crear',  'descripc' => 'Crear casa']);
        Permission::create(['name' => 'casa-editar',  'descripc' => 'Editar casa']);
        Permission::create(['name' => 'casa-borrar',  'descripc' => 'Inactivar casa']);

        Permission::create(['name' => 'medicamento-leer',  'descripc' => 'Listar medicamentos']);
        Permission::create(['name' => 'medicamento-crear',  'descripc' => 'Crear medicamento']);
        Permission::create(['name' => 'medicamento-editar',  'descripc' => 'Editar medicamento']);
        Permission::create(['name' => 'medicamento-borrar',  'descripc' => 'Inactivar medicamento']);

        Permission::create(['name' => 'mmarca-leer',  'descripc' => 'Listar marcas']);
        Permission::create(['name' => 'mmarca-crear',  'descripc' => 'Crear marca']);
        Permission::create(['name' => 'mmarca-editar',  'descripc' => 'Editar marca']);
        Permission::create(['name' => 'mmarca-borrar',  'descripc' => 'Inactivar marca']);

        Permission::create(['name' => 'minvima-leer',  'descripc' => 'Listar listar registros invima']);
        Permission::create(['name' => 'minvima-crear',  'descripc' => 'Crear registro invima']);
        Permission::create(['name' => 'minvima-editar',  'descripc' => 'Editar registro invima']);
        Permission::create(['name' => 'minvima-borrar',  'descripc' => 'Inactivar registro invima']);

        Permission::create(['name' => 'mlote-leer',  'descripc' => 'Listar lotes']);
        Permission::create(['name' => 'mlote-crear',  'descripc' => 'Crear lote']);
        Permission::create(['name' => 'mlote-editar',  'descripc' => 'Editar lote']);
        Permission::create(['name' => 'mlote-borrar',  'descripc' => 'Inactivar lote']);

        Permission::create(['name' => 'mnpt-leer',  'descripc' => 'Listar npts']);
        Permission::create(['name' => 'mnpt-crear',  'descripc' => 'Crear npt']);
        Permission::create(['name' => 'mnpt-editar',  'descripc' => 'Editar npt']);
        Permission::create(['name' => 'mnpt-borrar',  'descripc' => 'Inactivar npt']);


        /**
         * dispositivos medicos
         */


        Permission::create(['name' => 'dispositivo-modulo',  'descripc' => 'Habilita los permisos para el módulo de dispositivos medicos']);

        Permission::create(['name' => 'dmedico-leer',  'descripc' => 'Listar dispmedis']);
        Permission::create(['name' => 'dmedico-crear',  'descripc' => 'Crear dispmedico']);
        Permission::create(['name' => 'dmedico-editar',  'descripc' => 'Editar dispmedico']);
        Permission::create(['name' => 'dmedico-borrar',  'descripc' => 'Inactivar dispmedico']);

        Permission::create(['name' => 'dmarca-leer',  'descripc' => 'Listar marcas dispositivos médicos']);
        Permission::create(['name' => 'dmarca-crear',  'descripc' => 'Crear marca dispositivos médicos']);
        Permission::create(['name' => 'dmarca-editar',  'descripc' => 'Editar marca dispositivos médicos']);
        Permission::create(['name' => 'dmarca-borrar',  'descripc' => 'Inactivar marca dispositivos médicos']);



        Permission::create(['name' => 'dlote-leer',  'descripc' => 'Listar lotes dispositivos médicos']);
        Permission::create(['name' => 'dlote-crear',  'descripc' => 'Crear lote dispositivos médicos']);
        Permission::create(['name' => 'dlote-editar',  'descripc' => 'Editar lote dispositivos médicos']);
        Permission::create(['name' => 'dlote-borrar',  'descripc' => 'Inactivar lote dispositivos médicos']);



        Permission::create(['name' => 'rango-leer',  'descripc' => 'Listar rangos']);
        Permission::create(['name' => 'rango-crear',  'descripc' => 'Crear rango']);
        Permission::create(['name' => 'rango-editar',  'descripc' => 'Editar rango']);
        Permission::create(['name' => 'rango-borrar',  'descripc' => 'Inactivar rango']);


        Permission::create(['name' => 'eps-leer',  'descripc' => 'Listar eps']);
        Permission::create(['name' => 'eps-crear',  'descripc' => 'Crear eps']);
        Permission::create(['name' => 'eps-editar',  'descripc' => 'Editar eps']);
        Permission::create(['name' => 'eps-borrar',  'descripc' => 'Inactivar eps']);

        Permission::create(['name' => 'paciente-leer',  'descripc' => 'Listar pacientes']);
        Permission::create(['name' => 'paciente-crear',  'descripc' => 'Crear paciente']);
        Permission::create(['name' => 'paciente-editar',  'descripc' => 'Editar paciente']);
        Permission::create(['name' => 'paciente-borrar',  'descripc' => 'Inactivar paciente']);

        Permission::create(['name' => 'formular-leer',  'descripc' => 'Listar formulaciones pacientes']);
        Permission::create(['name' => 'formular-crear',  'descripc' => 'Crear formulación paciente']);
        Permission::create(['name' => 'formular-editar',  'descripc' => 'Editar formulación paciente']);
        Permission::create(['name' => 'formular-borrar',  'descripc' => 'Inactivar formulación paciente']);
        Permission::create(['name' => 'formular-copiar',  'descripc' => 'Copiar formulación']);

        /**
         * Producción
         */
        Permission::create(['name' => 'produccion-modulo',  'descripc' => 'Habilita los permisos para el módulo de producciòn']);
        $permiso = 'preplibe';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar de preparadores y revisores']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear revisor y preparador']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar revisor y preparador']);
        Permission::create(['name' => $permiso . '-borrarxx',  'descripc' => 'Inactivar revisor y preparador']);
        Permission::create(['name' => $permiso . '-activarx',  'descripc' => 'Activar revisor y preparador']);

        $permiso = 'revision';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar revisiones']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear revisión']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar revisión']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar revisión']);

        $permiso = 'alistami';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar alistamientos']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear alistamiento']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar alistamiento']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar alistamiento']);

        $permiso = 'preparac';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar preparaciones']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear preparación']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar preparación']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar preparación']);

        $permiso = 'controlp';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar controles en proceso']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear control es proceso']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar control es proceso']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar control es proceso']);

        $permiso = 'controlt';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar controles de productos terminados']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear control de producto terminado']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar control de producto terminado']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar control de producto terminado']);

        $permiso = 'concilia';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar conciliaciones']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear conciliación']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar conciliación']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar conciliación']);




        Permission::create(['name' => 'excel-leer',  'descripc' => 'Listar listar registros invima dispositivos médicos']);
        Permission::create(['name' => 'excel-crear',  'descripc' => 'Crear registro invima dispositivos médicos']);
        Permission::create(['name' => 'excel-editar',  'descripc' => 'Editar registro invima dispositivos médicos']);
        Permission::create(['name' => 'excel-borrar',  'descripc' => 'Inactivar registro invima dispositivos médicos']);
        /**
         * Administrar
         */
        Permission::create(['name' => 'sistema-modulo',  'descripc' => 'Habilita los permisos para el módulo de administración del sistema']);

        $permiso = 'roles';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar roles']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Crear rol']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar rol']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar rol']);

        $permiso = 'rpermiso';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Lista de premisos asignados al rol']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Asignar permisos al rol']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar permisos del rol']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar permisos del rol']);




        $permiso = 'uroles';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar roles del usuario']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Asignar roles al usuario']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar roles del usuario']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar rol del usuario']);

        $permiso = 'servicio';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar servicios']);
        Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Asignar servicio']);
        Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar servicio']);
        Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar servicio']);



        $permiso = 'alerta';
        Permission::create(['name' => $permiso . '-cliente',  'descripc' => 'Listar las alertas del cliente']);
        Permission::create(['name' => $permiso . '-revisar',  'descripc' => 'Listar las alertas de revisiones']);
        Permission::create(['name' => $permiso . '-preparar',  'descripc' => 'Listar las alertas de preparaciones']);
        Permission::create(['name' => $permiso . '-procesar',  'descripc' => 'Listar las alertas de control en proceso']);
        Permission::create(['name' => $permiso . '-terminar',  'descripc' => 'Listar las alertas de producto terminado']);

        /**
         * Reportes
         */
        Permission::create(['name' => 'reportes-modulo',  'descripc' => 'Habilita los permisos para el módulo de reportes']);

        Permission::create(['name' => 'controlpf-leer',  'descripc' => 'Listar controles en proceso y productos finalizados']);
        Permission::create(['name' => 'controlpf-crear',  'descripc' => 'Crear control en proceso y finalizado']);
        Permission::create(['name' => 'controlpf-editar',  'descripc' => 'Editar control en proceso y finalizado']);
        Permission::create(['name' => 'controlpf-borrar',  'descripc' => 'Inactivar control en proceso y finalizado']);

        Permission::create(['name' => 'ordprodu-leer',  'descripc' => 'Listar órdenes de producción']);
        Permission::create(['name' => 'ordprodu-crear',  'descripc' => 'Crear órden de producción']);
        Permission::create(['name' => 'ordprodu-editar',  'descripc' => 'Editar órden de producción']);
        Permission::create(['name' => 'ordprodu-borrar',  'descripc' => 'Inactivar órden de producción']);


        $permiso = 'cerliblo';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar certificado de liberación de lote']);
        // Permission::create(['name' => $permiso . '-crear',  'descripc' => 'Asignar servicio']);
        // Permission::create(['name' => $permiso . '-editar',  'descripc' => 'Editar servicio']);
        // Permission::create(['name' => $permiso . '-borrar',  'descripc' => 'Inactivar servicio']);
        $permiso = 'etiqueta';
        Permission::create(['name' => $permiso . '-leer',  'descripc' => 'Listar las etiquetas']);
        Permission::create(['name' => $permiso . '-imprimir',  'descripc' => 'Permiso para imprimir la etiqueta seleccionada']);
    }
}
