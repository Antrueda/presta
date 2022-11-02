<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de las Multivitaminas Hidrosolubles
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait VitalipoTrait
{

    public static function getVitalipoReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[19] = (float)$dataxxxx['cantidad'] * 230;
                break;
            case 2: // neonatos
                $formulax[19] = (float)$dataxxxx['cantidad'] * 230;
                break;
            case 3: // adultos
                $formulax[18] = (float)$dataxxxx['cantidad'] * 0.099;
                break;
        }
        return $formulax;
    }

    public static function getVitalipoReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[19] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[19] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[18] = (float)$dataxxxx['cantidad'] / 0.099;
                break;
        }
        return $formulax;
    }

    public static function getVitalipoPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[19] = (float)$dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[19] = (float)$dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[18] = (float)$dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getVitalipoVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos

                $formulax[19] = $dataxxxx['reqtotal'] / 230;
                break;
            case 2: // neonatos

                $formulax[19] = $dataxxxx['reqtotal'] / 230;
                break;
            case 3: // adultos
                $formulax[18] = $dataxxxx['reqtotal'];
                break;
        }
        return $formulax;
    }
}
