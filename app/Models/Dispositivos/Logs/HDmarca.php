<?php

namespace App\Models\Dispositivos\Logs;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HDmarca extends Model
{
     protected $fillable = [
      'reginvim', 'dmedico_id','marcaxxx',    'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];


}
