<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de los Lipidos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait LipidosxTrait
{
    public static function getLipidosxReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {

            case 1: // pediatricos
                $formulax[26] = ((float)$dataxxxx['cantidad'] / 5) / $dataxxxx['pesoxxxx'];
                $formulax[27] = ((float)$dataxxxx['cantidad'] / 5) / $dataxxxx['pesoxxxx'];
                $formulax[28] = ((float)$dataxxxx['cantidad'] / 10) / $dataxxxx['pesoxxxx'];
                break;
            case 2: // neonatos
                $formulax[26] = ((float)$dataxxxx['cantidad'] / 5) / $dataxxxx['pesoxxxx'];
                $formulax[27] = ((float)$dataxxxx['cantidad'] / 5) / $dataxxxx['pesoxxxx'];
                $formulax[28] = ((float)$dataxxxx['cantidad'] / 10) / $dataxxxx['pesoxxxx'];
                break;
            case 3: // adultos
                $formulax[26] = ((float)$dataxxxx['cantidad'] / 5) / $dataxxxx['pesoxxxx'];
                $formulax[27] = ((float)$dataxxxx['cantidad'] / 5) / $dataxxxx['pesoxxxx'];
                $formulax[28] = ((float)$dataxxxx['cantidad'] / 10) / $dataxxxx['pesoxxxx'];
                break;
        }
        return $formulax;
    }

    public static function getLipidosxReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[26] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                $formulax[27] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                $formulax[28] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                break;
            case 2: // neonatos
                $formulax[26] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                $formulax[27] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                $formulax[28] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                break;
            case 3: // adultos
                $formulax[26] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                $formulax[27] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                $formulax[28] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'];
                break;
        }
        return $formulax;
    }

    public static function getLipidosxPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[26] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                $formulax[27] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                $formulax[28] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[26] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                $formulax[27] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                $formulax[28] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[26] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                $formulax[27] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                $formulax[28] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getLipidosxVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[26] = ($dataxxxx['reqtotal'] * 5);
                $formulax[27] = ($dataxxxx['reqtotal'] * 5);
                $formulax[28] = ($dataxxxx['reqtotal'] * 5);

                break;
            case 2: // neonatos
                $formulax[26] = ($dataxxxx['reqtotal'] * 5);
                $formulax[27] = ($dataxxxx['reqtotal'] * 5);
                $formulax[28] = ($dataxxxx['reqtotal'] * 5);

                break;
            case 3: // adultos
                $formulax[26] = ($dataxxxx['reqtotal'] * 5);
                $formulax[27] = ($dataxxxx['reqtotal'] * 5);
                $formulax[28] = ($dataxxxx['reqtotal'] * 10);
                break;
        }
        return $formulax;
    }
}
