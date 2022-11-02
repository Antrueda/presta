<?php

namespace App\Models\Formulaciones\Logs;

use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Mlote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HDformula extends Model
{

  protected $fillable = [
    'cformula_id',
    'medicame_id',
    'preparar',
    'cantidad',
    'rtotal',
    'volumen',
    'purga',
    'user_edita_id', 'user_crea_id',  'id_old',
    'sis_esta_id',
    'rutaxxxx',
    'metodoxx',
    'ipxxxxxx',
  ];


}
