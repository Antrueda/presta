<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Description of Fosfatos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait FosfatoxTrait
{
    public static function getFosfatoxReqdiario($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[5] = (float)$dataxxxx['cantidad']; // fosfato
                $formulax[6] = (float)$dataxxxx['cantidad']  * 2.6; // fosfato
                $formulax[7] = (float)$dataxxxx['cantidad']; //fosfato
                break;
            case 2: // neonatos
                $formulax[5] = (float)$dataxxxx['cantidad']; // fosfato
                $formulax[6] = (float)$dataxxxx['cantidad']  * 2.6; // fosfato
                $formulax[7] = (float)$dataxxxx['cantidad']; //fosfato
                break;
            case 3: // adultos
                $formulax[5] = (float)$dataxxxx['cantidad']; // fosfato
                $formulax[6] = (float)$dataxxxx['cantidad'] * 2.6; // fosfato
                $formulax[7] = (float)$dataxxxx['cantidad']; //fosfato
                break;
        }
        return $formulax;
    }

    public static function getFosfatoxReqtotal($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[5] = (float)$dataxxxx['cantidad']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
                $formulax[6] = (float)$dataxxxx['cantidad']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
                $formulax[7] = (float)$dataxxxx['cantidad'];  //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
                break;
            case 2: // neonatos
                $formulax[5] = (float)$dataxxxx['cantidad']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
                $formulax[6] = (float)$dataxxxx['cantidad']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
                $formulax[7] = (float)$dataxxxx['cantidad'];  //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
                break;
            case 3: // adultos
                $formulax[5] = (float)$dataxxxx['cantidad']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
                $formulax[6] = (float)$dataxxxx['cantidad']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
                $formulax[7] = (float)$dataxxxx['cantidad'];  //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
                break;
        }

        return $formulax;
    }

    public static function getFosfatoxPurga($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[5] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f3 fosfato glicerofosfato
                $formulax[6] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f4 fosfato corpaul
                $formulax[7] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f5 fostao pisa
                break;
            case 2: // neonatos
                $formulax[5] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f3 fosfato glicerofosfato
                $formulax[6] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f4 fosfato corpaul
                $formulax[7] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f5 fostao pisa
                break;
            case 3:
                $formulax[5] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f3 fosfato glicerofosfato
                $formulax[6] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f4 fosfato corpaul
                $formulax[7] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //f5 fostao pisa
                break;
        }
        return $formulax;
    }

    public static function getFosfatoxVolumen($dataxxxx)
    {
        $formulax = [];
        switch ($dataxxxx['nptidxxx']) {
            case 1: // pediatricos
                $formulax[5] = $dataxxxx['reqtotal']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
                $formulax[6] = $dataxxxx['reqtotal'] / 2.6; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
                $formulax[7] = $dataxxxx['reqtotal']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
                break;
            case 2: // neonatos
                $formulax[5] = $dataxxxx['reqtotal']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
                $formulax[6] = $dataxxxx['reqtotal'] / 2.6; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
                $formulax[7] = $dataxxxx['reqtotal']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
                break;
            case 3: // adultos

                $formulax[5] = $dataxxxx['reqtotal']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
                $formulax[6] = $dataxxxx['reqtotal'] / 2.6; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
                $formulax[7] = $dataxxxx['reqtotal']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
                break;
        }
        return $formulax;
    }
}
