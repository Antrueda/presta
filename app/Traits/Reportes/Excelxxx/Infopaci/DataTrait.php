<?php

namespace App\Traits\Reportes\Excelxxx\Infopaci;

use App\Models\Clinica\Crango;
use App\Models\Formulaciones\Cformula;
use App\Traits\Reportes\Excelxxx\RangoDescripcionTrait;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait DataTrait
{
    use RangoDescripcionTrait;
    public function getExcel($dataxxxx)
    {
        $excelxxx = [];
        $formulac = Cformula::select(
            [
                'cformulas.id',
                'cformulas.created_at',
                'cformulas.sis_clinica_id',
                'cformulas.volumen',
                'cformulas.crango_id',
                'pacientes.npt_id',
                'pacientes.nombres',
                'pacientes.apellidos',
                'pacientes.cedula'
            ]
        )
           ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
              ->whereBetween(
                  'cformulas.created_at',
                  [
                      "{$dataxxxx['requestx']->fechdesd} 00:00:00",
                      "{$dataxxxx['requestx']->fechasta} 23:59:59"
                  ]
              )
              ->where('cformulas.crango_id','!=',null)
              ->where('paciente_id', $dataxxxx['requestx']->paciente_id)
              ->get();
        $totalxxx = 0;
        
        foreach ($formulac as $key => $valuexxx) {
            $crangoxx = Crango::find($valuexxx->crango_id)->rcodigo;
            $excelxxx[] = [
                'fechanpt' => explode(' ' ,$valuexxx->created_at)[0],
                //'paciente' => $valuexxx->id,
                'paciente' => $valuexxx->nombres . ' ' . $valuexxx->apellidos,
                'histclin' => $valuexxx->cedula,
                'tiponutr' => $this->getDescripcion($crangoxx),
                'volumenx' => $valuexxx->volumen,
            ];
            $totalxxx++;
        }
        return  $excelxxx;
    }
}
