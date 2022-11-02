<?php

namespace App\Models\Medicamentos\Logs;


class HCasaMedicamento extends \Illuminate\Database\Eloquent\Relations\Pivot {

  protected $fillable = [
      'medicamento_id',
      'casa_id',
      'estadoxx',
      'id_old',
      'user_edita_id',
      'user_crea_id',
        'sis_esta_id',

        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
  ];



}
