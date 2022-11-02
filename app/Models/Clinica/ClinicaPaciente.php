<?php

namespace App\Models\Clinica;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClinicaPaciente extends Pivot {

  protected $table = 'paciente_sis_clinica';
protected $fillable = [
      'sis_clinica_id', 'paciente_id','user_edita_id', 'user_crea_id',
      'sis_esta_id',
  ];
  public function clinica() {
    return $this->belongsTo(Clinica::class);
  }

  public function paciente() {
    return $this->belongsTo(Paciente::class);
  }

}
