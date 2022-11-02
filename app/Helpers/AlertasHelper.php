<?php

namespace App\Helpers;

use App\Models\Alerta;
use App\Models\Tipoaccion;
use Illuminate\Support\Facades\Auth;

class AlertasHelper
{

    public static function getArmarAlerta($dataxxxx)
    {
        $registrx = ['respuest' => false, 'encabeza' => ['totalxxx' => 0], 'dataxxxx' => []];
        $acciones = Tipoaccion::where(function ($queryxxx) use ($dataxxxx) {
            $queryxxx->where('id', $dataxxxx['tipoacci']);
            return $queryxxx;
        })->first();
        $registrx['encabeza']['tituloxx'] = $acciones->tituloxx;
        $registrx['encabeza']['iconoxxx'] = $acciones->iconoxxx;
        $registrx['encabeza']['pestania'] = $acciones->pestania;

        if (auth()->user()->can($acciones->permisox)) {

            $alertaxx = Alerta::join('cformulas', 'alertas.cformula_id', '=', 'cformulas.id')

                ->where(function ($queryxxx) use ($acciones) {
                    $queryxxx->where('leidaxxx', 0);
                    $queryxxx->where('tipoaccion_id', $acciones->id);
                    $queryxxx->where('cformulas.created_at', 'LIKE',date('Y-m-d').'%');

                    if (Auth::user()->sis_clinica_id != 1) {
                        $queryxxx->where('sis_clinica_id', 2);
                    }
                })
                ->where('cformulas.sis_esta_id',1)
                ->get();
            foreach ($alertaxx as $key => $value) {
                $cuerpoxx = $acciones->cuerpoxx;
                if ($dataxxxx['tipoacci'] == 1) { // se ha creado una formulacion
                    $cuerpoxx = str_replace("xxxxxxxx", $value->cformula->sis_clinica->sucursal, $cuerpoxx);
                }
                $clinicax = $value->cformula->sis_clinica;
                $cuerpoxx = str_replace("yyyyyyyy", $value->cformula_id, $cuerpoxx);
                $registrx['respuest'] = true;
                $registrx['encabeza']['totalxxx'] += 1;
                $registrx['dataxxxx'][] = [
                    'titulink' => $acciones->titulink,
                    'cuerpoxx' => $cuerpoxx. ' Clínica: ' . $clinicax->clinica->clinica. '(Sucursal:'.$clinicax->sucursal.')',
                    'fechorax' => 'FECHA Y HORA: ' . $value->cformula->created_at ,
                    'linkxxxx' => route($acciones->routexxx, $dataxxxx['tipoacci'] == 1 ? [$clinicax->id, $value->cformula->paciente_id, $value->routexxx] : [$value->routexxx])
                ];
            }
            $registrx['encabeza']['tituloxx'] = $registrx['encabeza']['totalxxx'] . ' ' . $registrx['encabeza']['tituloxx'];
        }

        return $registrx;
    }
    public static function alertas()
    {
        $acciones = ['totalxxx' => 0, 'notifica' => ' NOTIFICACION(ES)', 'dataxxxx' => []];
        foreach (Tipoaccion::get() as $key => $value) {
            $respuest = AlertasHelper::getArmarAlerta(['tipoacci' => $value->id]);
            if ($respuest['respuest']) {
                $acciones['totalxxx'] += $respuest['encabeza']['totalxxx'];
                $acciones['dataxxxx'][] = $respuest;
            }
        }
        $acciones['notifica'] = $acciones['totalxxx'] . $acciones['notifica'];
        return $acciones;
        // echo 'esto es una prueba de mi helper' . Auth::user()->id;
    }
}
