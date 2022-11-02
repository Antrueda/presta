<?php

namespace App\Models\Produccion\Logs;


use Illuminate\Database\Eloquent\Model;

class HCalistamgables extends Model
{
    protected $fillable = [
        'unidad',
        'cantcons',
        'diferenc',
        'calistamgable_id',
        'calistamgable_type',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];

}
