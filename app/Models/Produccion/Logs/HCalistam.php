<?php

namespace App\Models\Produccion\Logs;


use Illuminate\Database\Eloquent\Model;

class HCalistam extends Model
{
    protected $fillable = [
        'producto',
        'orden_id',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];

}
