<?php

namespace App\Models\Formulaciones\Logs;

use App\Models\Medicamentos\Mlote;
use Illuminate\Database\Eloquent\Model;

class HDfmlote extends Model  {

  protected $fillable = [
      'dformula_id',
      'mlote_id',
      'volumenx',
      'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];


}
