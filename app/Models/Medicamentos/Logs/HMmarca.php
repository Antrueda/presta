<?php

namespace App\Models\Medicamentos\Logs;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HMmarca extends Model {

  protected $fillable = [
      'nombcome', 'osmorali', 'pesoespe', 'formfarm', 'sis_esta_id', 'marcaxxx', 'medicame_id','user_edita_id', 'user_crea_id',  'id_old',

      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];



}
