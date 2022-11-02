<?php

namespace App\Traits\Reportes\Excelxxx\Nutrelab;

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
                'pacientes.cedula',
                'clinicas.nitxxxxx',
                'terminados.created_at as createda'
            ]
        )
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
            ->join('terminados', 'cformulas.terminado_id', '=', 'terminados.id')
            ->whereBetween(
                'cformulas.created_at',
                [
                    "{$dataxxxx['requestx']->fechdesd} 00:00:00",
                    "{$dataxxxx['requestx']->fechasta} 23:59:59"
                ]
            )
            ->where('cformulas.crango_id', '!=', null)
            ->where('cformulas.crango_id', '!=', null)
            ->get();
        foreach ($formulac as $key => $valuexxx) {
            $crangoxx = Crango::find($valuexxx->crango_id)->rcodigo;
            $excelxxx[] = [
                'fechanpt' => explode(' ', $valuexxx->created_at)[0],
                'remision' => $valuexxx->id,
                'paciente' => $valuexxx->nombres . ' ' . $valuexxx->apellidos,
                'histclin' => $valuexxx->cedula,
                'clinicax' => $valuexxx->nitxxxxx,
                'tiponutr' => $this->getDescripcion($crangoxx),
                'codigoxx' => $crangoxx->codiprod,
                'fechaven' => date("Y-m-d", strtotime($valuexxx->createda . "+ 2 days")),
            ];
        }
        return  $excelxxx;
    }
}
