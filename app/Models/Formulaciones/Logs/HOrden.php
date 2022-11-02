<?php

namespace App\Models\Formulaciones\Logs;

use App\Models\Produccion\Calistam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HOrden extends Model
{
  protected $fillable = [
    'ordeprod', 'observac',
    'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx',
  ];


}
