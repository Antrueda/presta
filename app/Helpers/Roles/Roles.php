<?php

namespace App\Helpers\Roles;

use App\Helpers\DatatableHelper;
use App\Models\Usuarios\RoleHasPermission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles
{
    public static function getRoles($request)
    {
        $paciente = Role::select(
            'roles.id',
            'roles.name',
            's_estado',
            'roles.sis_esta_id'
        )
            ->join('sis_estas', 'roles.sis_esta_id', '=', 'sis_estas.id');
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getPermisos($request)
    {
        $rolesxxx = RoleHasPermission::select(['permission_id'])->where('role_id', $request->padrexxx)->get();
        $paciente = Permission::select(
            'permissions.id',
            'permissions.name',
            'permissions.descripc',
            's_estado',
            'permissions.sis_esta_id'
        )
            ->join('sis_estas', 'permissions.sis_esta_id', '=', 'sis_estas.id')
            ->whereNotIn('permissions.id',$rolesxxx);
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getRpermiso($request)
    {
        $paciente = RoleHasPermission::select(
            [
                'permissions.id',
                'permissions.name',
                'permissions.descripc',
                'role_has_permissions.sis_esta_id',
                'sis_estas.s_estado',
            ]
        )
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->join('sis_estas', 'role_has_permissions.sis_esta_id', '=', 'sis_estas.id')
            ->where('role_has_permissions.role_id', $request->padrexxx);


        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getAsignarPermiso($request)
    {
        $rolxxxxx = Role::find($request->rolxxxxx);
        $permisox = Permission::find($request->permisox);
        switch ($request->asigquit) {
            case 1: // asignar permiso al rol
                $rolxxxxx->givePermissionTo($permisox->name); 
                break;
            case 2: // quitar el premiso del rol
                $rolxxxxx->revokePermissionTo($permisox->name);
                break;
        }
        return response()->json([]);
    }
}
