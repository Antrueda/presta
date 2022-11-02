<?php

namespace App\Models\Logs;

use App\Models\Clinica\Clinica;
use App\Models\Reportes\Orden;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HRemision extends Model {

  protected $fillable = [
      'orden_id', 'clinica_id','quimfarm_id',   'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];


}
