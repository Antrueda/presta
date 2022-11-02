<?php

namespace App\Models\Sistema\Logs;

use App\User;
use Spatie\Permission\Models\Permission;

class HSisPermiso extends Permission
{
    protected $fillable = [     'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx', 'name', 'guard_name','descripc'];
    protected $attributes = ['sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1];
   }
