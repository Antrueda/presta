<?php

namespace App\Traits\Reporte;

use App\Helpers\DatatableHelper;
use App\Models\Formulaciones\Cformula;
use App\Models\Reportes\Orden;

trait EtiquetasTrait
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


  public static function getTerminados($request)
  {

      $paciente = Cformula::select([
          'cformulas.id', 'cformulas.sis_esta_id', 'cformulas.terminado_id',
          'sis_estas.s_estado','cformulas.created_at', 'pacientes.cedula',
          'clinicas.clinica', 'pacientes.nombres', 'pacientes.apellidos'
      ])
          ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
          ->join('procesos', 'cformulas.proceso_id', '=', 'procesos.id')
          ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
          ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
          ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id')
          ->whereNotNull('cformulas.terminado_id' )
          ->orderBy('cformulas.terminado_id', 'ASC')
          ->orderBy('cformulas.created_at', 'ASC');
      return DatatableHelper::getDt($paciente, $request);
  }
}
