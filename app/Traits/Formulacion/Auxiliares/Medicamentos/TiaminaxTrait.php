<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Calculos para la formulacion de las Tiaminas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class TiaminaxTrait
{

    public static function getTiaminaxReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[23] = (float)$dataxxxx['cantidad'] * 100;
                break;
            case 2: // neonatos
                $formulax[23] = (float)$dataxxxx['cantidad'] * 100;
                break;
            case 3: // adultos
                $formulax[23] = (float)$dataxxxx['cantidad'] * 100;
                break;
        }
        return  $formulax;
    }

    public static function getTiaminaxReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[23] = (float)$dataxxxx['cantidad'];
                break;
            case 2: // neonatos
                $formulax[23] = (float)$dataxxxx['cantidad'];
                break;
            case 3: // adultos
                $formulax[23] = (float)$dataxxxx['cantidad'];
                break;
        }
        return  $formulax;
    }

    public static function getTiaminaxPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[23] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[23] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
            case 3:
                $formulax[23] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx'];
                break;
        }
        return  $formulax;
    }

    public static function getTiaminaxVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[23] = $dataxxxx['reqtotal'] / 100;
                break;
            case 2: // neonatos
                $formulax[23] = $dataxxxx['reqtotal'] / 100;
                break;
            case 3: // adultos
                $formulax[23] = $dataxxxx['reqtotal'] / 100;
                break;
        }
        return  $formulax;
    }
}
