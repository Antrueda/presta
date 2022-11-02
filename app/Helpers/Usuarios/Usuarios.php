<?php

namespace App\Helpers\Usuarios;

use App\Helpers\DatatableHelper;
use App\Models\Usuarios\ModelHasRole;
use App\Models\Usuarios\Urole;
use App\User;
use Spatie\Permission\Models\Role;

class Usuarios
{
    public static function getUsuarios($request)
    {
        $paciente = User::select(
            'users.id',
            'users.name',
            'users.email',
            'sis_clinicas.sucursal',
            's_estado',
            'users.sis_esta_id'
        )
            ->join('sis_clinicas', 'users.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('sis_estas', 'users.sis_esta_id', '=', 'sis_estas.id');
        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getRoles($request)
    {
        $rolesxxx = ModelHasRole::select(['role_id'])->where('model_id', $request->padrexxx)->get();
        $paciente = Role::select([ 'roles.id','roles.name',])
            ->whereNotIn('id', $rolesxxx);
        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getUroles($request)
    {
        $paciente = ModelHasRole::select(
            [
                'roles.id',
                'roles.name',
                'model_has_roles.sis_esta_id',
                'sis_estas.s_estado',
            ]
        )
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('sis_estas', 'model_has_roles.sis_esta_id', '=', 'sis_estas.id')
            ->where('model_has_roles.model_id', $request->padrexxx);


        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getAsignaRol($request)
    {
        $rolxxxxx = Role::find($request->rolxxxxx);
        $user = User::find($request->padrexxx);
        switch ($request->asigquit) {
            case 1:
                $user->assignRole($rolxxxxx->name);
                break;
            case 2:
                $user->removeRole($rolxxxxx->name);
            break;
        }
        return response()->json([]);
    }
}
