<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de los Elementos Trazas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait ElemtrazTrait
{


    public static function getElemtrazReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[17] = (float)$dataxxxx['cantidad'] * 250 / $dataxxxx['pesoxxxx'];
                $formulax[14] = (float)$dataxxxx['cantidad'] * 0.33;
                $formulax[15] = (float)$dataxxxx['cantidad'] * 0.077;
                $formulax[16] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[17] = (float)$dataxxxx['cantidad'] * 250 / $dataxxxx['pesoxxxx'];
                $formulax[14] = (float)$dataxxxx['cantidad'] * 0.33;
                $formulax[15] = (float)$dataxxxx['cantidad'] * 0.077;
                $formulax[16] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[14] = (float)$dataxxxx['cantidad'] * 0.33;
                $formulax[15] = (float)$dataxxxx['cantidad'] * 0.077;
                $formulax[16] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getElemtrazReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[14] = (float)$dataxxxx['cantidad'];
                $formulax[15] = (float)$dataxxxx['cantidad'];
                $formulax[16] = (float)$dataxxxx['cantidad'];
                $formulax[17] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[14] = (float)$dataxxxx['cantidad'];
                $formulax[15] = (float)$dataxxxx['cantidad'];
                $formulax[16] = (float)$dataxxxx['cantidad'];
                $formulax[17] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[14] = (float)$dataxxxx['cantidad'];
                $formulax[15] = (float)$dataxxxx['cantidad'];
                $formulax[16] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getElemtrazPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[14] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[15] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[16] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[17] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[14] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[15] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[16] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[17] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[14] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[15] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                $formulax[16] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float) $dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getElemtrazVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[14] = $dataxxxx['reqtotal'] / 0.33;
                $formulax[15] = $dataxxxx['reqtotal'] / 0.077;
                $formulax[16] = $dataxxxx['reqtotal'];
                $formulax[17] = $dataxxxx['reqtotal'] / 250;
                break;
            case 2: // neonatos
                $formulax[14] = $dataxxxx['reqtotal'] / 0.33;
                $formulax[15] = $dataxxxx['reqtotal'] / 0.077;
                $formulax[16] = $dataxxxx['reqtotal'];
                $formulax[17] = $dataxxxx['reqtotal'] / 250;
                break;
            case 3: // adultos
                $formulax[14] = $dataxxxx['reqtotal'] / 0.33;
                $formulax[15] = $dataxxxx['reqtotal'] / 0.077;
                $formulax[16] = $dataxxxx['reqtotal'];
                break;
        }
        return $formulax;
    }
}
