<?php

namespace App\Models\Usuarios\Logs;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HRol extends Role
{

    protected $fillable = [
        'name',   'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx','guard_name'
    ];

 }
