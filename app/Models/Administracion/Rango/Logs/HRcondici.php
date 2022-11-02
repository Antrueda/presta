<?php

namespace App\Models\Administracion\Rango\Logs;

use App\Models\Administracion\Condicio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HRcondici extends Model
{
    protected $fillable = [
        'rnpt_id',
        'condicio_id',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];


}
