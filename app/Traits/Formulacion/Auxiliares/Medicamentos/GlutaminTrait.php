<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de las Glutaminas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait GlutaminTrait
{
    public static function getGlutaminReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[4] = (float)$dataxxxx['cantidad'] / 5 / $dataxxxx['pesoxxxx'];
                break;
            case 2: // neonatos
                $formulax[4] = (float)$dataxxxx['cantidad'] / 5 / $dataxxxx['pesoxxxx'];
                break;
            case 3: // adultos
                $formulax[4] = (float)$dataxxxx['cantidad'] / 5 / $dataxxxx['pesoxxxx'];
                break;
        }
        return $formulax;
    }

    public static function getGlutaminReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[4] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[4] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[4] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getGlutaminPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[4] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[4] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[4] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getGlutaminVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[4] = $dataxxxx['reqtotal'] * 5;
                break;
            case 2: // neonatos
                $formulax[4] = $dataxxxx['reqtotal'] * 5;
                break;
            case 3: // adultos
                $formulax[4] = $dataxxxx['reqtotal'] * 5;
                break;
        }
        return $formulax;
    }
}
