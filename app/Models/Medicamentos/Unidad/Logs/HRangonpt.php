<?php

namespace App\Models\Medicamentos\Unidad\Logs;

use Illuminate\Database\Eloquent\Model;

class HRangonpt extends Model
{
    protected $fillable = [
        'randesde',
        'ranhasta',

        'id_old',
        'sis_esta_id',
        'user_crea_id',
        'user_edita_id',

        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];
}
