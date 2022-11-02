<?php

namespace App\Models\Pacientes;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PacienteServicio extends Pivot {
   protected $fillable = [
      'paciente_id', 'servicio_id', 'estado_id'
  ];

  public function paciente() {
    return $this->belongsTo(Paciente::class);
  }
  public function servicio() {
    return $this->belongsTo(Servicio::class);
  }
  
}
