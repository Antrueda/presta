<?php

namespace App\Models\Medicamentos\Logs;

use Illuminate\Database\Eloquent\Model;

class HNpt extends Model {

  public static function combo($dataxxxx)
  {
      $comboxxx = [];
      if ($dataxxxx['cabecera']) {
          if ($dataxxxx['ajaxxxxx']) {
              $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
          } else {
              $comboxxx = ['' => 'Seleccione'];
          }
      }
      $activida = Npt::whereNotIn('id',[4])->get();
      foreach ($activida as $registro) {
          if ($dataxxxx['ajaxxxxx']) {
              $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->nombre];
          } else {
              $comboxxx[$registro->id] = $registro->nombre;
          }
      }
      return $comboxxx;
  }

}
