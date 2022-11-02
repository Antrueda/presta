<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de l Aguas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class AguaesteTrait
{
    public static function getAguaesteReqdiario($dataxxxx)
    {
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[29] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[29] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[29] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getAguaesteReqtotal($dataxxxx)
    {
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[29] = 1;
                break;
            case 2: // neonatos
                $formulax[29] = 1;
                break;
            case 3: // adultos
                $formulax[29] = 1;
                break;
        }
        return $formulax;
    }

    public static function getAguaestePurga($dataxxxx)
    {
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[29] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[29] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[29] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getAguaesteVolumen($dataxxxx)
    {
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[29] = $dataxxxx['reqtotal'];
                break;
            case 2: // neonatos
                $formulax[29] = $dataxxxx['reqtotal'];
                break;
            case 3: // adultos
                $formulax[29] = $dataxxxx['reqtotal'];
                break;
        }
        return $formulax;
    }
}
