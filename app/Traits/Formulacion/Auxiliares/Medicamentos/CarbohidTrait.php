<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Description of Carbohidratos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait CarbohidTrait
{


    public static function getCarbohidReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[8] = (float)$dataxxxx['cantidad'] / 2 / $dataxxxx['pesoxxxx'] / 1.44; //carbo
                $formulax[9] = (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx'] / 1.44; //carbo
                break;
            case 2: // neonatos
                $formulax[8] = (float)$dataxxxx['cantidad'] / 2 / $dataxxxx['pesoxxxx'] / 1.44; //carbo
                $formulax[9] = (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx'] / 1.44; //carbo
                break;
            case 3: // adultos
                $formulax[8] = (float)$dataxxxx['cantidad'] / 2 / $dataxxxx['pesoxxxx'] / 1.44; //carbo
                $formulax[9] = (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx'] / 1.44; //carbo
                break;
        }
        return $formulax;
    }

    public static function getCarbohidReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[8] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'] * 1.44; //f6 carbohidrato 50
                $formulax[9] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'] * 1.44; //f7 carbohidrato 10
                break;
            case 2: // neonatos
                $formulax[8] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'] * 1.44; //f6 carbohidrato 50
                $formulax[9] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'] * 1.44; //f7 carbohidrato 10
                break;
            case 3: // adultos
                $formulax[8] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'] * 1.44; //f6 carbohidrato 50
                $formulax[9] = (float)$dataxxxx['cantidad'] * $dataxxxx['pesoxxxx'] * 1.44; //f7 carbohidrato 10
                break;
        }
        return $formulax;
    }

    public static function getCarbohidPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[8] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f6 carbohidrato 50
                $formulax[9] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f7 carbohidrato 10
                break;
            case 2: // neonatos
                $formulax[8] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f6 carbohidrato 50
                $formulax[9] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f7 carbohidrato 10
                break;
            case 3:
                $formulax[8] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f6 carbohidrato 50
                $formulax[9] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f7 carbohidrato 10
                break;
        }
        return $formulax;
    }

    public static function getCarbohidVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[8] = $dataxxxx['reqtotal'] * 2; //CARBOHIDRATOS  DAD 50%
                $formulax[9] = $dataxxxx['reqtotal'] * 10; //CARBOHIDRATOS  DAD 10%
                break;
            case 2: // neonatos
                $formulax[8] = $dataxxxx['reqtotal'] * 2; //CARBOHIDRATOS  DAD 50%
                $formulax[9] = $dataxxxx['reqtotal'] * 10; //CARBOHIDRATOS  DAD 10%
                break;
            case 3: // adultos
                $formulax[8] = $dataxxxx['reqtotal'] * 2; //CARBOHIDRATOS  DAD 50%
                $formulax[9] = $dataxxxx['reqtotal'] * 10; //CARBOHIDRATOS  DAD 10%
                break;
        }
        return $formulax;
    }
}
