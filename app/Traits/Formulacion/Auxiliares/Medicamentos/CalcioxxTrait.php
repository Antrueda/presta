<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Description of Gluconatos
 * CALCIO GLUCONATO 10%
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait CalcioxxTrait {



  public static function getCalcioxxReqdiario($dataxxxx) {
    $formulax = [];
    switch ($dataxxxx['nptidxxx']) {
      case 1: // pediatricos
        $formulax[12] = (double)$dataxxxx['cantidad'] * 100 / $dataxxxx['pesoxxxx']; //CALCIO GLUCONATO 10%
        break;
      case 2: // neonatos
        $formulax[12] = (double)$dataxxxx['cantidad'] * 100 / $dataxxxx['pesoxxxx']; //CALCIO GLUCONATO 10%
        break;
      case 3: // adultos
        $formulax[12] = (double)$dataxxxx['cantidad'] * 9.2; //CALCIO GLUCONATO 10%
        break;
    }
    return $formulax;
  }

  public static function getCalcioxxReqtotal($dataxxxx) {
    $formulax = [];
    switch ($dataxxxx['nptidxxx']) {
      case 1:// pediatricos
        $formulax[12] = $dataxxxx['pesoxxxx'] * (double)$dataxxxx['cantidad']; //CALCIO GLUCONATO 10%
        break;
      case 2:// neonatos
        $formulax[12] = $dataxxxx['pesoxxxx'] * (double)$dataxxxx['cantidad']; //CALCIO GLUCONATO 10%
        break;
      case 3:// adultos
        $formulax[12] = (double)$dataxxxx['cantidad']; //CALCIO GLUCONATO 10%
        break;
    }
    return $formulax;
  }

  public static function getCalcioxxPurga($dataxxxx) {
    $formulax = [];
    switch ($dataxxxx['nptidxxx']) {
      case 1:// pediatricos
        $formulax[12] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (double)$dataxxxx['volumenx'];
        break;
      case 2:// neonatos
        $formulax[12] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (double)$dataxxxx['volumenx'];
        break;
      case 3:
        $formulax[12] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (double)$dataxxxx['volumenx'];
        break;
    }
    return $formulax;
  }

  public static function getCalcioxxVolumen($dataxxxx) {
    $formulax = [];
    switch ($dataxxxx['nptidxxx']) {
      case 1:// pediatricos
        $formulax[12] = $dataxxxx['reqtotal'] / 100;
        break;
      case 2:// neonatos
        $formulax[12] = $dataxxxx['reqtotal'] / 100;
        break;
      case 3:// adultos
        $formulax[12] = $dataxxxx['reqtotal'] / 9.2;
        break;
    }
    return $formulax;
  }



}
