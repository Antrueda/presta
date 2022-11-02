<?php

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;


trait AminoaciTrait
{
    public static function getAminoaciReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[1] =  (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx']; //f1 amino 10 aminino
                $formulax[3] =  (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx']; //pediatrico aminoacido
                break;
            case 2: // neonatos
                $formulax[1] =  (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx']; //f1 amino 10 aminino
                $formulax[3] =  (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx']; //pediatrico aminoacido
                break;
            case 3: // adultos
                $formulax[1] =  (float)$dataxxxx['cantidad'] / 10 / $dataxxxx['pesoxxxx']; //f1 amino 10 aminino
                $formulax[2] =  (float)$dataxxxx['cantidad'] / (100 / 15) / $dataxxxx['pesoxxxx']; //f1 amino 10 amino
                break;
        }
        return $formulax;
    }

    public static  function getAminoaciReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[1] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']; //f1 amino 10
                $formulax[3] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']; //f2 amino 15
                break;
            case 2: // neonatos
                $formulax[1] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']; //f1 amino 10
                $formulax[3] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']; //f2 amino 15
                break;
            case 3: // adultos
                $formulax[1] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']; //f1 amino 10
                $formulax[2] = $dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']; //f2 amino 15
                break;
        }
        return $formulax;
    }

    public static function getAminoaciPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[1] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f1 amino 10
                $formulax[3] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f2 amino 15
                break;
            case 2: // neonatos
                $formulax[1] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f1 amino 10
                $formulax[3] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f2 amino 15
                break;
            case 3:
                $formulax[1] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f1 amino 10
                $formulax[2] =  $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f2 amino 15
                break;
        }
        return $formulax;
    }

    public static function getAminoaciVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[1] = $dataxxxx['reqtotal'] * 10; //AMINOÁCIDOS ADULTOS 10% S/E
                $formulax[2] = $dataxxxx['reqtotal'] * 6.7; //AMINOÁCIDOS ADULTOS 15% S/E
                $formulax[3] = $dataxxxx['reqtotal'] * 10; //AMINOÁCIDO PEDIÁTRICO
                break;
            case 2: // neonatos
                $formulax[1] = $dataxxxx['reqtotal'] * 10; //AMINOÁCIDOS ADULTOS 10% S/E
                $formulax[2] = $dataxxxx['reqtotal'] * 6.7; //AMINOÁCIDOS ADULTOS 15% S/E
                $formulax[3] = $dataxxxx['reqtotal'] * 10; //AMINOÁCIDO PEDIÁTRICO
                break;
            case 3: // adultos
                $formulax[1] = $dataxxxx['reqtotal'] * 10; //AMINOÁCIDOS ADULTOS 10% S/E
                $formulax[2] = $dataxxxx['reqtotal'] * 6.7; //AMINOÁCIDOS ADULTOS 15% S/E
                break;
        }
        return $formulax;
    }
}
