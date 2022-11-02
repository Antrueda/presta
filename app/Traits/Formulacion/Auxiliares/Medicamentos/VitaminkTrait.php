<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de las Vitaminas K
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait VitaminkTrait
{

    public static function getVitaminkReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[25] = (float)$dataxxxx['cantidad'] / 0.1;
                break;
            case 2: // neonatos
                $formulax[25] = (float)$dataxxxx['cantidad'] / 0.1;
                break;
            case 3: // adultos
                $formulax[25] = (float)$dataxxxx['cantidad'] / 0.1;
                break;
        }
        return $formulax;
    }

    public static function getVitaminkReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[25] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[25] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[25] = (float)$dataxxxx['cantidad'];
                break;
        }
        return $formulax;
    }

    public static function getVitaminkPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[25] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[25] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[25] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return $formulax;
    }

    public static function getVitaminkVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[25] = (float)$dataxxxx['reqtotal'] * 0.1;
                break;
            case 2: // neonatos
                $formulax[25] = (float)$dataxxxx['reqtotal'] * 0.1;
                break;
            case 3: // adultos
                $formulax[25] = (float)$dataxxxx['reqtotal'] * 0.1;
                break;
        }
        return $formulax;
    }
}
