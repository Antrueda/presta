<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de los Magnesios
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait MagnesioTrait
{

    public static function getMagnesioReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[13] = ((float)$dataxxxx['cantidad'] * 200) / $dataxxxx['pesoxxxx'];
                break;
            case 2: // neonatos
                $formulax[13] = ((float)$dataxxxx['cantidad'] * 200) / $dataxxxx['pesoxxxx'];
                break;
            case 3: // adultos
                $formulax[13] = (float)$dataxxxx['cantidad'] * 19;
                break;
        }
        return $formulax;
    }

    public static function getMagnesioReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[13] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[13] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[13] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getMagnesioPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[13] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];;
                break;
            case 2: // neonatos
                $formulax[13] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];;
                break;
            case 3:
                $formulax[13] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];;
                break;
        }
        return $formulax;
    }

    public static function getMagnesioVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[13] = $dataxxxx['reqtotal'] / 200;
                break;
            case 2: // neonatos
                $formulax[13] = $dataxxxx['reqtotal'] / 200;
                break;
            case 3: // adultos
                $formulax[13] = $dataxxxx['reqtotal'] / 19;
                break;
        }
        return $formulax;
    }
}
