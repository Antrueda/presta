<?php

namespace App\Models\Medicamentos\Logs;

use App\Models\Medicamentos\Unidad\Urangnpt;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HMnpt extends  Model
{

  protected $fillable = [
    'medicame_id',
    'urangnpt_id',
    'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
  ];


}
