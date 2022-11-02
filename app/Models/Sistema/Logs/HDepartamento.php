<?php

namespace App\Models\Sistema\Logs;

use Illuminate\Database\Eloquent\Model;

class HDepartamento extends Model
{
  protected $fillable = [
    'nombre',
    'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx',
  ];

}
