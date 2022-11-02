<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de las VitaminasC
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait VitamincTrait
{


    public static function getVitamincReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[21] = (float)$dataxxxx['cantidad'] * 100;
                break;
            case 2: // neonatos
                $formulax[21] = (float)$dataxxxx['cantidad'] * 100;
                break;
            case 3: // adultos
                $formulax[21] = (float)$dataxxxx['cantidad'] * 100;
                break;
        }
        return  $formulax;
    }

    public static function getVitamincReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[21] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[21] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[21] = (float)$dataxxxx['cantidad'];
                break;
        }
        return  $formulax;
    }

    public static function getVitamincPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[21] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[21] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[21] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return  $formulax;
    }

    public static function getVitamincVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[21] = (float)$dataxxxx['reqtotal'] / 100;
                break;
            case 2: // neonatos
                $formulax[21] = (float)$dataxxxx['reqtotal'] / 100;
                break;
            case 3: // adultos
                $formulax[21] = (float)$dataxxxx['reqtotal'] / 100;
                break;
        }
        return  $formulax;
    }
}
