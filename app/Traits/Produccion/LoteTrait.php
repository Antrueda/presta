<?php

namespace App\Traits\Produccion;

use App\Helpers\DatatableHelper;
use App\Models\Clinica\Crango;
use App\Models\Dispositivos\Dlote;
use App\Models\Formulaciones\Cformula;
use App\Models\Itemordene;
use App\Models\Medicamentos\Mlote;
use App\Models\Produccion\Calistam;
use App\Models\Produccion\Proceso;
use App\Models\Produccion\Terminado;
use App\Models\Remision;
use App\Models\Reportes\ControlPF;
use App\Models\Reportes\Orden;
use App\User;

trait LoteTrait
{

  private $registro = [
    'medidisp' => '', // medicamento
    'lotexxxx' => '', // lote medicamento
    'consumid' => '', // cantidad consumida del medicamento
    'alistada' => '', // cantidad alistada del medicamento
    'sobrante' => '', // cantidad sobrante del medicamento
    'identifi' => '', // indentificador del medicamento
  ];


  public static function getLote($request)
  {
    $ordenxxx = Cformula::select([
      'dlotes.id', 'dlotes.lotexxxx', 'dlotes.fechvenc','dmarcas.marcaxxx as marca',
      'sis_estas.s_estado', 'dlotes.created_at'
    ])
      ->join('sis_estas', 'dlotes.sis_esta_id', '=', 'sis_estas.id')
      ->join('dmarcas', 'dlotes.dmarca_id', '=', 'dmarcas.id');

    return DatatableHelper::getDt($ordenxxx, $request);
  }

  public static function getLotes($request)
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

  public static function getOrdens($request)
  {
   
    $ordenxxx=Orden::
    select(['ordens.id','ordens.ordeprod',"ordens.created_at",])->get();
      return DatatableHelper::getDt($ordenxxx, $request);
  }


}
