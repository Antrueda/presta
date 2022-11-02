<?php

namespace App\Traits\Produccion;

use App\Helpers\DatatableHelper;
use App\Models\Produccion\Calistam;

use App\Models\Reportes\Orden;


trait AlistamientoTrait
{

  private $registro = [
    'medidisp' => '', // medicamento
    'lotexxxx' => '', // lote medicamento
    'consumid' => '', // cantidad consumida del medicamento
    'alistada' => '', // cantidad alistada del medicamento
    'sobrante' => '', // cantidad sobrante del medicamento
    'identifi' => '', // indentificador del medicamento
  ];
  private $concilia = [];
  private $dispocan;
  private $mediccan;

  public static function getOrdenControlPf($request)
  {
    $ordenxxx = Orden::select([
      'ordens.id', 'ordens.ordeprod', 'ordens.observac',
      'sis_estas.s_estado', 'ordens.created_at'
    ])
      ->join('sis_estas', 'ordens.sis_esta_id', '=', 'sis_estas.id');;

    return DatatableHelper::getDt($ordenxxx, $request);
  }


  public static function getAlistamientos($request)
  {
      $paciente = Calistam::select([
          'calistams.id', 'calistams.producto', 'ordens.ordeprod', 'calistams.sis_esta_id',
          'sis_estas.s_estado', 'calistams.created_at'
      ])
          ->join('ordens', 'calistams.orden_id', '=', 'ordens.id')
          ->join('sis_estas', 'calistams.sis_esta_id', '=', 'sis_estas.id');

      return DatatableHelper::getDt($paciente, $request);
  }
}
