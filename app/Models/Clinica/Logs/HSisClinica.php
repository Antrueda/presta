<?php

namespace App\Models\Clinica\Logs;


use Illuminate\Database\Eloquent\Model;


class HSisClinica extends Model
{
    protected $fillable = [
         'sucursal','clinica_id', 'municipio_id', 'user_edita_id', 'user_crea_id',  'id_old',
         'sis_esta_id',
         'rutaxxxx',
         'metodoxx',
         'ipxxxxxx',
    ];

}
