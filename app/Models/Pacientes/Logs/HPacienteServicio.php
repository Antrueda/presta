<?php

namespace App\Models\Pacientes\Logs;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HPacienteServicio extends Pivot {
   protected $fillable = [
      'paciente_id', 'servicio_id', 'estado_id',  'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];


}
