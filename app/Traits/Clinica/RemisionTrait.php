<?php

namespace App\Traits\Clinica;

use App\Models\Formulaciones\Cformula;
use App\Models\Remision;
use App\Traits\Reportes\Excelxxx\Infoclin\MedicamentosCobrarTrait;
use App\Traits\Reportes\Excelxxx\RangoDescripcionTrait;

trait RemisionTrait
{
    use MedicamentosCobrarTrait;
    use RangoDescripcionTrait;
    public function imprimir($dataxxxx)
    {
        $orientac = ['landscape', 'portrait']; // orientaciones del pdf
        $datosxxx = $dataxxxx['dataxxxx'];
        $view = \View::make($dataxxxx['vistaurl'], compact('datosxxx'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper($dataxxxx['margenes'], $orientac[$dataxxxx['orientac']]);

        if ($dataxxxx['tipoxxxx'] == 1) {
            return $pdf->stream('reporte');
        }
        if ($dataxxxx['tipoxxxx'] == 2) {
            return $pdf->download('reporte.pdf');
        }
        if ($dataxxxx['tipoxxxx'] == 3) {
            return view($dataxxxx['vistaurl'], compact('datosxxx'));
        }
    }

    public function geOdenes(Remision $objetoxx)
    {
        $formulac = Cformula::join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->where('cformulas.orden_id', $objetoxx->orden_id)
            ->where('sis_clinicas.clinica_id', $objetoxx->clinica_id)->get();
        if (isset($formulac[0])) {
            $dataxxxx = [
                'vistaurl' => 'Clinicas.Remision.formulario.ordenes',
                'dataxxxx' => [
                    'formulac' => $formulac,
                    'ordenxxx' => $objetoxx->orden->ordeprod,
                    'despejsi' => 'X',
                    'despejno' => '__',
                    'desponsi' => 'X',
                    'desponno' => '__'
                ],
                'orientac' => 1,
                'tipoxxxx' => 1,
                'margenes' => array(0, 0, 9.5 * 72, 14.9 * 72)
            ];
            return $this->imprimir($dataxxxx);
        } else {
            return redirect()->route('cremision')
                ->with('info', 'No hay formualaciones terminadas para la orden: ' . $objetoxx->orden->ordeprod);
        }
    }

    public function geRemision(Remision $objetoxx) {
        foreach (Cformula::where('orden_id', $objetoxx->orden_id)->where('terminado_id','!=',null)->get() as $value) {
          $formulac[] = [
              'paciente' => [
                  'nombrexx' => $value->paciente->nombres . ' ' . $value->paciente->apellidos,
                  'document' => $value->paciente->cedula,
                  'nptxxxxx' => $value->paciente->npt->nombre,
              ],
              'rangoxxx'=>$this->getDescripcion($value->crango->rcodigo),
              'cobrsepa' => $this->getCobrarMCT(['cformula'=>$value]),
              'lotexxxx' => $value->id,
              'quimicox' => $objetoxx->quimfarm->name,
          ];
        }
        $dataxxxx = [
            'vistaurl' => 'Clinicas.Remision.formulario.remision',
            'dataxxxx' => [
                'clinicax' => [
                    'nombrexx' => $objetoxx->clinica->clinica,
                    'direccio' => $objetoxx->clinica->direccio,
                    'telefono' => $objetoxx->clinica->telefono
                ],
                'fechaxxx' => explode(' ', $objetoxx->created_at)[0],
                'formulac' => $formulac,
            ],
            'orientac' => 1,
            'tipoxxxx' => 1,
            'margenes' => array(0, 0, 9.5 * 72, 14.9 * 72)];
        return $this->imprimir($dataxxxx);
      }
}
