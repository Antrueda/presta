<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 *  Calculos para la formulacion de los ComplejosB
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class ComplejbTrait
{


    public static function getComplejbReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[22] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[22] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[22] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getComplejbReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[22] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[22] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[22] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getComplejbPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[22] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[22] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[22] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getComplejbVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[22] = $dataxxxx['reqtotal'];
                break;
            case 2: // neonatos
                $formulax[22] = $dataxxxx['reqtotal'];
                break;
            case 3: // adultos
                $formulax[22] = $dataxxxx['reqtotal'];
                break;
        }
        return $formulax;
    }
}
