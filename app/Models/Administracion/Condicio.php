<?php

namespace App\Models\Administracion;

use App\Models\Clinica\Crango;
use Illuminate\Database\Eloquent\Model;

class Condicio extends Model
{
    protected $fillable = [
        'condicio', 'consinli', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
    ];


    private static function getNotIn($dataxxxx)
    {
        $notinxxx = []; // almacena las condicienes que ya fueron asignadas
        /**
         * encontrar la condiciones asignada al rango y la clinica
         */
        $crangosx = Crango::where('rango_id', $dataxxxx['rango_id'])->where('sis_clinica_id', $dataxxxx['clinicax'])->get();
        /**
         * recorrer las condiciones encontradas
         */
        foreach ($crangosx as $condicio) {
            /**
             * se almacenan
             */
            if (!in_array($condicio->condicio_id, $notinxxx)) {
                $notinxxx[] = $condicio->condicio_id;
            }
        }

        return $notinxxx;
    }
    public static function combo($dataxxxx)
    {
        $notinxxx = [];
        $crangosx = Crango::where('rcodigo_id', $dataxxxx['rango_id'])
        ->where('sis_clinica_id', $dataxxxx['clinicax'])->get();
        foreach ($crangosx as $crangoxx) {
            if ($dataxxxx['condicio'] != $crangoxx->condicio_id) {
                $notinxxx[] = $crangoxx->condicio_id;
            }
        }

        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        if ($dataxxxx['rango_id'] > 0) {
            $activida = Condicio::whereNotIn('id', $notinxxx)->get();
            foreach ($activida as $registro) {
                if ($dataxxxx['ajaxxxxx']) {
                    $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->condicio];
                } else {
                    $comboxxx[$registro->id] = $registro->condicio;
                }
            }
        }
        return $comboxxx;
    }
    /**
     * premite identificar si a un rango asignado a la clinica le hacen falta asignarle condiciones
     */
    public static function getVerificarExistencia($dataxxxx)
    {
        $condicio = true; // false no le hace falta y true ya están todas
        /**
         * buscar las condicones que hacen falta por asignar
         */

        $activida = Condicio::whereNotIn('id', Condicio::getNotIn($dataxxxx))->get();

        /**
         * recorrer las condiciones encontradas
         */
        foreach ($activida as $registro) {
            $condicio = false; // al entrar es porque hay por asignar
        }
        return $condicio;
    }

    public static function getCombo($dataxxxx)
    {
        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = Condicio::get();
        foreach ($activida as $registro) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->condicio];
            } else {
                $comboxxx[$registro->id] = $registro->condicio;
            }
        }

        return $comboxxx;
    }
}
