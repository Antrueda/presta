<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

use App\Models\Medicamentos\Medicame;

/**
 * Description of Potasios
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait PotasioxTrait
{

    /**
     * calcula requerimiento cuando se digita el volumen
     */
    public static function getPotasioxReqdiario($dataxxxx)
    {

        $factorxx = 0;
        switch ($dataxxxx['fosfatid']) {
            case 6:
                $factorxx = 3.8;
                break;
            case 7:
                $factorxx = 2;
                break;
        }
        $formulax = [];
        $fosfcant = $dataxxxx['fosfcant'];
        if ($fosfcant == '') {
            $fosfcant = 0;
        }
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $calculox = $fosfcant * $dataxxxx['pesoxxxx'] * $factorxx;
                $formulax[11] = ((float)$dataxxxx['cantidad'] * 2 + $calculox) / $dataxxxx['pesoxxxx']; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $calculox = $fosfcant * $dataxxxx['pesoxxxx'] * $factorxx;
                $formulax[11] = ((float)$dataxxxx['cantidad'] * 2 + $calculox) / $dataxxxx['pesoxxxx']; //POTASIO CLORURO
                break;
            case 3: // adultos
                $calculox = $fosfcant * $factorxx;
                $formulax[11] = ((float)$dataxxxx['cantidad'] * 2 + $calculox) / $dataxxxx['pesoxxxx']; //POTASIO CLORURO
                break;
        }
        return $formulax;
    }

    public static function getPotasioxReqtotal($dataxxxx)
    {
        $restasxx = 0;


        switch ($dataxxxx['fosfatid']) {
            case 6:
                if ($dataxxxx['nptidxxx'] == 3) {
                    $restasxx = $dataxxxx['fosfcant'] * 3.6; //f9  potasio
                } else {
                    $restasxx = $dataxxxx['fosfcant'] * 3.8;
                }
                break;
            case 7:
                if ($dataxxxx['nptidxxx'] == 3) {
                    $restasxx = $dataxxxx['fosfcant'] * 2; //f9  potasio
                } else {
                    $volumenx = ($dataxxxx['fosfcant'] * $dataxxxx['pesoxxxx']);
                    $restasxx = $volumenx > 0 ? $volumenx * 2 : 0; //f9  potasio
                }
                break;
        }
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[11] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'] - $restasxx; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $formulax[11] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'] - $restasxx; //POTASIO CLORURO
                break;
            case 3: // adultos
                $formulax[11] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad'] - $restasxx; //POTASIO CLORURO
                break;
        }
        return $formulax;
    }

    public static function getPotasioxPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[11] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $formulax[11] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //POTASIO CLORURO
                break;
            case 3:
                $formulax[11] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //POTASIO CLORURO
                break;
        }
        return $formulax;
    }
    // cuando se digita requerimiento diario
    /**
     * calcula el volumen cuando se digita el requerimiento diario
     */
    public static function getPotasioxVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[11] = $dataxxxx['reqtotal'] / 2; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $formulax[11] = $dataxxxx['reqtotal'] / 2; //POTASIO CLORURO
                break;
            case 3: // adultos
                $formulax[11] = $dataxxxx['reqtotal'] / 2; //POTASIO CLORURO
                break;
        }
        return $formulax;
    }
}
