<?php


namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 *  Calculos para la formulacion de los Acidos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait AcidfoliTrait
{

    public static function getAcidfoliReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[24] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[24] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[24] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getAcidfoliReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[24] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[24] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[24] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getAcidfoliPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[24] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[24] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[24] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getAcidfoliVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[24] = $dataxxxx['reqtotal'];
                break;
            case 2: // neonatos
                $formulax[24] = $dataxxxx['reqtotal'];
                break;
            case 3: // adultos
                $formulax[24] = $dataxxxx['reqtotal'];
                break;
        }
        return $formulax;
    }
}
