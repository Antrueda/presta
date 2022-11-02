<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Traits\Formulacion\Auxiliares\Medicamentos;

/**
 * Description of Sodios
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait SodioxxxTrait {


  public static function getSodioxxxReqdiario($dataxxxx) {
    $formulax = [];
    $calcfosf = 0;
    switch ($dataxxxx['nptidxxx']) {
      case 1: // pediatricos
        if ($dataxxxx['fosfatid'] == 5) {
          $calcfosf = $dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] = ((float)$dataxxxx['cantidad'] * 2 + $calcfosf) / $dataxxxx['pesoxxxx']; //SODIO CLORURO
        break;
      case 2: // neonatos
        if ($dataxxxx['fosfatid'] == 5) {
          $calcfosf = $dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] = ((float)$dataxxxx['cantidad'] * 2 + $calcfosf) / $dataxxxx['pesoxxxx']; //SODIO CLORURO
        break;
      case 3: // adultos
        if ($dataxxxx['fosfatid'] == 5) {
          $calcfosf = $dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] = ((float)$dataxxxx['cantidad'] * 2 + $calcfosf) / $dataxxxx['pesoxxxx']; //SODIO CLORURO
        break;
    }
    return  $formulax;
  }

  public static function getSodioxxxReqtotal($dataxxxx) {
    $formulax = [];
    $restaxxx = 0;
    switch ($dataxxxx['nptidxxx']) {
      case 1:// pediatricos
        if ($dataxxxx['fosfatid'] == 5) {
          $restaxxx = $dataxxxx['fosfcant'] *  2;
        }
        $formulax[10] =  ($dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']) - $restaxxx; //SODIO CLORURO
        break;
      case 2:// neonatos
        if ($dataxxxx['fosfatid'] == 5) {
          $restaxxx = $dataxxxx['fosfcant'] *  2;
        }
        $formulax[10] =  ($dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']) - $restaxxx; //SODIO CLORURO
        break;
      case 3:// adultos
        if ($dataxxxx['fosfatid'] == 5) {
          $restaxxx = $dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] =  ($dataxxxx['pesoxxxx'] * (float)$dataxxxx['cantidad']) - $restaxxx; //SODIO CLORURO
        break;
    }
    return  $formulax;
  }

  public static function getSodioxxxPurga($dataxxxx) {
    $formulax = [];
    switch ($dataxxxx['nptidxxx']) {
      case 1:// pediatricos
        $formulax[10] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //SODIO CLORURO
        break;
      case 2:// neonatos
        $formulax[10] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //SODIO CLORURO
        break;
      case 3:
        $formulax[10] = $dataxxxx['volupurg'] / $dataxxxx['volutota'] * (float)$dataxxxx['volumenx']; //SODIO CLORURO
        break;
    }
    return  $formulax;
  }

  public static function getSodioxxxVolumen($dataxxxx) {
    $formulax = [];
    switch ($dataxxxx['nptidxxx']) {
      case 1:// pediatricos
        $formulax[10] = $dataxxxx['reqtotal'] / 2; //SODIO CLORURO
        break;
      case 2:// neonatos
        $formulax[10] = $dataxxxx['reqtotal'] / 2; //SODIO CLORURO
        break;
      case 3:// adultos
        $formulax[10] = $dataxxxx['reqtotal']/2; //SODIO CLORURO
        break;
    }
    return  $formulax;
  }

}
