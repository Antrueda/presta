<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class HDispensacione extends Model {

  protected $fillable = [
      'fechaxxx',
      'opxxxxxx',
      'estado_id',
      'producto',
      'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];

}
