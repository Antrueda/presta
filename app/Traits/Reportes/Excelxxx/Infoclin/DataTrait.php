<?php

namespace App\Traits\Reportes\Excelxxx\Infoclin;

use App\Models\Clinica\Crango;
use App\Models\Formulaciones\Cformula;
use App\Traits\Reportes\Excelxxx\RangoDescripcionTrait;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait DataTrait
{
    use RangoDescripcionTrait;
    private $diferenc;

    public function getResumenDT($dataxxxx)
    {
        $resumeny = ['cantidad' => 1, 'codigoxx' => $dataxxxx['rangoxxx']->id, 'codiword' => $dataxxxx['rangoxxx']->rcodigo->codiprod, 'rangoxxx' => $this->getDescripcion($dataxxxx['rangoxxx']->rcodigo)];
        // si es el primer registro
        if (count($this->opciones['resumenx']) == 0) {
            $this->opciones['resumenx'][] = $resumeny;
        } else {
            // recorrer todos lo rangos existentes
            foreach ($this->opciones['resumenx'] as $key => $resumenx) {
                // sumar los rangos
                if ($resumenx['codigoxx'] == $dataxxxx['rangoxxx']->id) {
                    $resumeny = $resumenx;
                    $resumeny['cantidad'] = $resumeny['cantidad'] + 1;
                    $this->opciones['resumenx'][$key] = $resumeny;
                } else { // asignar uno nuevo
                    $this->opciones['resumenx'][] = $resumeny;
                }
            }
        }
    }
    public function getArmarData($dataxxxx)
    {

        $excelxxx = $dataxxxx['excelxxx'];
        $formulac = Cformula::select(
            [
                'cformulas.id',
                'cformulas.sis_clinica_id',
                'cformulas.volumen',
                'cformulas.crango_id',
                'pacientes.npt_id',
                'pacientes.nombres',
                'pacientes.apellidos',
                'pacientes.cedula'
            ]
        )
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->where(
                'cformulas.created_at',
                'like',
                $dataxxxx['fechaxxx'] . "%"
            )
            ->where('cformulas.crango_id', '!=', null)
            ->where('clinica_id', $dataxxxx['clinicax'])
            ->get();
        $totalxxx = 0;

        foreach ($formulac as $key => $valuexxx) {
            $crangoxy = Crango::find($valuexxx->crango_id);
            $this->getResumenDT(['rangoxxx' => $crangoxy]);
            $crangoxy =  $crangoxy->rcodigo;
            $crangoxx = $crangoxy->rcondici->condicio;
            $excelxxx[] = [
                'fechanpt' => $dataxxxx['fechaxxx'],
                'paciente' => $valuexxx->nombres . ' ' . $valuexxx->apellidos,
                'histclin' => $valuexxx->cedula,
                'cobrsepa' => $this->getCobrarMCT(['cformula' => Cformula::find($valuexxx->id)]),
                'tiponutr' => $this->getDescripcion($crangoxy),
                'volulipi' => ($crangoxx->consinli == 1 || $crangoxx->consinli == 2) ? $valuexxx->volumen : '',
                'volsinli' => $crangoxx->consinli == 3 ? $valuexxx->volumen : '',
                'cantinpt' => 1,
                'valornpt' => 0,
                'totalxxx' => ['totalxxx' => 0, 'fechadia' => '']
            ];
            $totalxxx++;
        }
        if ($totalxxx > 0) {
            $excelxxx[] = [
                'totalxxx' => ['totalxxx' => $totalxxx, 'fechadia' => $dataxxxx['fechaxxx']]
            ];
        }

        return  $excelxxx;
    }
    public function getExcel($dataxxxx)
    {

        $excelxxx = [];
        $formulac = Cformula::select(['cformulas.created_at'])
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->whereBetween(
                'cformulas.created_at',
                [
                    "{$dataxxxx['requestx']->fechdesd} 00:00:00",
                    "{$dataxxxx['requestx']->fechasta} 23:59:59"
                ]
            )
            ->where('cformulas.crango_id', '!=', null)
            ->where('clinica_id', $dataxxxx['requestx']->clinica_id)
            ->get();

        $fachasxx = [];
        foreach ($formulac as $key => $valuexxx) {
            $fechaxxy = explode(' ', $valuexxx->created_at)[0];
            if (!in_array($fechaxxy, $fachasxx)) {
                $fachasxx[] = $fechaxxy;
            }
        }
        foreach ($fachasxx as $key => $value) {
            $excelxxx = $this->getArmarData(['fechaxxx' => $value, 'clinicax' => $dataxxxx['requestx']->clinica_id, 'excelxxx' => $excelxxx]);
        }

        return $excelxxx;
    }
}
