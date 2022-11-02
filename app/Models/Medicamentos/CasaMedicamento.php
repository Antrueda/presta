<?php

namespace App\Models\Medicamentos;


class CasaMedicamento extends \Illuminate\Database\Eloquent\Relations\Pivot {

  protected $fillable = [
      'medicamento_id',
      'casa_id',
      'estadoxx'
  ];

  public function medicamento() {
    return $this->belongsTo(Medicamento::class);
  }
  public function casa() {
    return $this->belongsTo(Casa::class);
  }

}
