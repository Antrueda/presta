<?php

namespace App\Models\Administracion\Logs;

use App\Models\Clinica\Crango;
use Illuminate\Database\Eloquent\Model;

class HCondicio extends Model
{
    protected $fillable = [
        'condicio', 'consinli',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];



}
