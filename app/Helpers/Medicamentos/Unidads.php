<?php

namespace App\Helpers\Medicamentos;

use App\Helpers\DatatableHelper;
use App\Models\Medicamentos\Unidad\Rangonpt;
use App\Models\Medicamentos\Unidad\Unidad;
use App\Models\Medicamentos\Unidad\Unidrang;
use App\Models\Medicamentos\Unidad\Urangnpt;

class Unidads
{
  public static function getRangonpts($request)
  {
    $paciente = Rangonpt::select(
      ['rangonpts.id', "rangonpts.randesde", "rangonpts.ranhasta", 'sis_estas.s_estado', 'rangonpts.sis_esta_id']
    )
      ->join('sis_estas', 'rangonpts.sis_esta_id', '=', 'sis_estas.id');
    return DatatableHelper::getDt($paciente, $request);
  }
  public static function getUnidads($request)
  {
    $paciente = Unidad::select(
      ['unidads.id', "unidads.s_unidad", 'sis_estas.s_estado', 'unidads.sis_esta_id']
    )
      ->join('sis_estas', 'unidads.sis_esta_id', '=', 'sis_estas.id');
    return DatatableHelper::getDt($paciente, $request);
  }
  public static function getUnidrangs($request)
  {
    $paciente = Unidrang::select(
      ['unidrangs.id', 'sis_estas.s_estado', 'unidrangs.sis_esta_id',
      'unidads.s_unidad','rangonpts.randesde','rangonpts.ranhasta', 'unidrangs.unidad_id'
      ]
    )
    ->join('unidads', 'unidrangs.unidad_id', '=', 'unidads.id')
    ->join('rangonpts', 'unidrangs.rangonpt_id', '=', 'rangonpts.id')
      ->join('sis_estas', 'unidrangs.sis_esta_id', '=', 'sis_estas.id');
    return DatatableHelper::getDt($paciente, $request);
  }
  public static function getUrnpts($request)
  {
    $paciente = Urangnpt::select(
      ['urangnpts.id', 'sis_estas.s_estado', 'urangnpts.sis_esta_id','npts.nombre',
      'unidads.s_unidad','rangonpts.randesde','rangonpts.ranhasta', 'unidrangs.unidad_id'
      ]
    )
    ->join('npts','urangnpts.npt_id','=','npts.id')
    ->join('unidrangs','urangnpts.unidrang_id','=','unidrangs.id')
    ->join('unidads', 'unidrangs.unidad_id', '=', 'unidads.id')
    ->join('rangonpts', 'unidrangs.rangonpt_id', '=', 'rangonpts.id')
      ->join('sis_estas', 'unidrangs.sis_esta_id', '=', 'sis_estas.id');
    return DatatableHelper::getDt($paciente, $request);
  }
}
