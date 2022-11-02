<?php

namespace App\Models\Formulaciones;

use App\Models\Medicamentos\Mlote;
use Illuminate\Database\Eloquent\Model;

class Dfmlote extends Model  {

  protected $fillable = [
      'dformula_id',
      'mlote_id',
      'volumenx',
      'user_crea_id',
      'user_edita_id',
      'sis_esta_id'
  ];

  public function dformula(){
    return $this->belongsTo(Dformula::class);
  }

  public function mlote(){
    return $this->belongsTo(Mlote::class);
  }
}
