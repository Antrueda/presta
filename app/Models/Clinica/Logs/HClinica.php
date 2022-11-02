<?php

namespace App\Models\Clinica\Logs;


use Illuminate\Database\Eloquent\Model;


class HClinica extends Model
{
    protected $fillable = [
        'nitxxxxx', 'clinica', 'telefono', 'digiveri', 'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];


}
