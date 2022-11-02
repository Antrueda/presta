<?php

namespace App\Traits\Produccion;


trait TerminadoTrait
{
    public function getPorcentaje($dataxxxx, $respuest)
    {
        $pesoreal = $dataxxxx['pesoteor'] * $dataxxxx['porcenta'] + $dataxxxx['pesoteor'];
        if ($dataxxxx['pesoreal']  > $pesoreal) {
            $respuest['limitesx']['valuexxx'] = 1;
            $respuest['limitesx']['opcionxx'] = 'NO';
            $respuest['concepto']['valuexxx'] = 1;
            $respuest['concepto']['opcionxx'] = 'RECHAZADO';
            $dataxxxx['valuexxx'] = 1;
            $respuest['limitesx']['messagex'] = "El fflpeso real: {$dataxxxx['pesoreal']} es superior al peso teórico : {$dataxxxx['pesoteor']}";
        }
        return $respuest;
    }
    public function validar($dataxxxx)
    {
        $respuest = [
            'limitesx' => [
                'valuexxx' => 2, 'opcionxx' => 'SI', 'campoxxx' => '#limitesx', 'messagex' => ''
            ],
            'concepto' => [
                'valuexxx' => 2, 'opcionxx' => 'APROBADO', 'campoxxx' => '#concepto'
            ],
            'valuexxx' => 2
        ];
        $dataxxxx['pesoteor'] = $dataxxxx['pesoteor'] + $dataxxxx['pesobols'];
        if ($dataxxxx['pesoreal'] < $dataxxxx['pesoteor']) {
            $dataxxxx['valuexxx'] = 1;
            $respuest['limitesx']['valuexxx'] = 1;
            $respuest['limitesx']['opcionxx'] = 'NO';
            $respuest['concepto']['valuexxx'] = 1;
            $respuest['concepto']['opcionxx'] = 'RECHAZADO';
            $respuest['limitesx']['messagex'] = "El peso real: {$dataxxxx['pesoreal']} es inferior al peso teórico : {$dataxxxx['pesoteor']}";
        } elseif ($dataxxxx['pesoteor'] < 1000) { //pediatricos y neonatos
            $dataxxxx['porcenta'] = 0.05;
            $respuest = $this->getPorcentaje($dataxxxx, $respuest);
        } elseif ($dataxxxx['pesoteor'] >= 1000) { // adultos
            $dataxxxx['porcenta'] = 0.1;
            $respuest = $this->getPorcentaje($dataxxxx, $respuest);
        }
        return $respuest;
    }
}
