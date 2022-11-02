<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipoaccion extends Model {
    protected $fillable = [
        'tituloxx',
        'permisox',
        'iconoxxx',
        'pestania',
        'routexxx',
        'titulink',
        'cuerpoxx',
        'user_crea_id',
        'user_edita_id',
        'sis_esta_id'
    ];
  public function alertas() {
    return $this->hasMany(Alerta::class);
  }

}
