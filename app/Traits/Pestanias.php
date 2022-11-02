<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Pestanias
{

  public function getUnidades($dataxxxx)
  {
    $unidadxx = [];
    if ($dataxxxx['tablaxxx'] == '') {
      $unidadxx = [
        'unidadxx' => ['', true, route('unidad'), 'active'],
        'urangosx' => ['disabled', false, '', ''],
        'urnptxxx' => ['disabled', false, '', ''],
      ];
    } else {
      $padrexxx = DB::table($dataxxxx['tablaxxx'])->where('id', $dataxxxx['idxxxxxx'])->first();
      switch ($dataxxxx['tablaxxx']) {
        case 'unidads':
          $unidadxx = [
            'unidadxx' => ['', true, route('unidad'), ''],
            'urangosx' => ['', true, route('urango',[$padrexxx->id]), 'active'],
            'urnptxxx' => ['disabled', false, '', ''],
          ];
          break;
        case 'unidrangs':
          $unidadxx = [
            'unidadxx' => ['', true, route('unidad'), ''],
            'urangosx' => ['', true, route('urango',[$padrexxx->unidad_id]), ''],
            'urnptxxx' => ['', true, route('urnpt',[$padrexxx->id]), 'active'],
          ];
          break;
      }
    }
    return  $unidadxx;
  }
}
