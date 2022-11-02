<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de las Multivitaminas Liposolubles
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait VitahidrTrait
{

    public static function getVitahidrReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[20] = (float)$dataxxxx['cantidad'] * 40;
                break;
            case 2: // neonatos
                $formulax[20] = (float)$dataxxxx['cantidad'] * 40;
                break;
            case 3: // adultos
                $formulax[20] = (float)$dataxxxx['cantidad'] * 0.04;
                $formulax[30] = (float)$dataxxxx['cantidad'] * 0.099;
                break;
        }
        return $formulax;
    }

    public static function getVitahidrReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[20] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[20] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[20] = (float)$dataxxxx['cantidad'] / 0.04;
                $formulax[30] = (float)$dataxxxx['cantidad'] / 0.099;
                break;
        }
        return $formulax;
    }

    public static function getVitahidrPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[20] = (float)$dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[20] = (float)$dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[20] = (float)$dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                $formulax[30] = (float)$dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getVitahidrVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[20] = $dataxxxx['reqtotal']/40;
                break;
            case 2: // neonatos
                $formulax[20] = $dataxxxx['reqtotal']/40;
                break;
            case 3: // adultos
                $formulax[20] = $dataxxxx['reqtotal'];
                $formulax[30] = $dataxxxx['reqtotal'];
                break;
        }
        return $formulax;
    }
}
