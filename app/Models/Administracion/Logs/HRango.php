<?php

namespace App\Models\Administracion\Logs;

use App\Models\Clinica\Crango;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HRango extends Model
{

  protected $fillable = [
    'ranginic',
    'rangfina',
    'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx',
  ];


}
