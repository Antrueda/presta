<?php

namespace App\Models\Administracion\Rango\Logs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HRcodigo extends Model
{
    protected $fillable = [
        'rcondici_id',
        'codiprod',
       // 'descripc',
       'user_edita_id', 'user_crea_id',  'id_old',
       'sis_esta_id',
       'rutaxxxx',
       'metodoxx',
       'ipxxxxxx',
    ];


}
