<?php

namespace App\Models\Logs;
use Spatie\Permission\Models\Role;

class HRoleext extends Role
{
    protected $fillable = [ 'nombre',   'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx'];
    protected $attributes = ['sis_esta_id' => 1,'user_crea_id'=>1,'user_edita_id'=>1];

}
