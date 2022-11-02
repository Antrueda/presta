<?php

namespace App\Models\Reportes\Logs;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HOrden extends Model {

  protected $fillable = [
     'ordeprod',
     'observac',
     'user_edita_id', 'user_crea_id',  'id_old',
     'sis_esta_id',
     'rutaxxxx',
     'metodoxx',
     'ipxxxxxx',
  ];


}
