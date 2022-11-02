<?php

namespace App\Models\Clinica\Logs;


use Illuminate\Database\Eloquent\Relations\Pivot;

class HClinicaPaciente extends Pivot {
  protected $table = 'h_paciente_sis_clinica';
protected $fillable = [
      'sis_clinica_id', 'paciente_id', 'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];

}
