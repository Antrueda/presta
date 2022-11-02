<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

/**
 * Description of Sodios
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Sodios {

  private $estructu;
  private $pesoxxxx;
  private $npt_idxx;
  private $medicame;
  private $casaxxxx;
  private $dataxxxx;
  private $purgaxxx;

  public function __construct($estructu, $pesoxxxx, $npt_idxx) {
    $this->estructu = $estructu;
    $this->pesoxxxx = $pesoxxxx;
    $this->npt_idxx = $npt_idxx;
    $this->medicame = 0;
    $this->casaxxxx = 0;
    $this->dataxxxx = [];
    $this->purgaxxx = 0;
  }

  private function requemientodiarionpt() {
    $formulax = [];
    $calcfosf = 0;
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        if ($this->dataxxxx['fosfa_id'] == 5) {
          $calcfosf = $this->dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] = ($this->dataxxxx['volumenx'] * 2 + $calcfosf) / $this->pesoxxxx; //SODIO CLORURO
        break;
      case 2: // neonatos
        if ($this->dataxxxx['fosfa_id'] == 5) {
          $calcfosf = $this->dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] = ($this->dataxxxx['volumenx'] * 2 + $calcfosf) / $this->pesoxxxx; //SODIO CLORURO
        break;
      case 3: // adultos
        if ($this->dataxxxx['fosfa_id'] == 5) {
          $calcfosf = $this->dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] = ($this->dataxxxx['volumenx'] * 2 + $calcfosf) / $this->pesoxxxx; //SODIO CLORURO
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt() {
    $formulax = [];
    $restaxxx = 0;
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        if ($this->dataxxxx['fosfa_id'] == 5) {
          $restaxxx = $this->dataxxxx['fosfcant'] * $this->pesoxxxx * 2;
        }
        $formulax[10] =  ($this->pesoxxxx * $this->dataxxxx['requdiar']) - $restaxxx; //SODIO CLORURO
        break;
      case 2:// neonatos
        if ($this->dataxxxx['fosfa_id'] == 5) {
          $restaxxx = $this->dataxxxx['fosfcant'] * $this->pesoxxxx * 2;
        }
        $formulax[10] =  ($this->pesoxxxx * $this->dataxxxx['requdiar']) - $restaxxx; //SODIO CLORURO
        break;
      case 3:// adultos
        if ($this->dataxxxx['fosfa_id'] == 5) {
          $restaxxx = $this->dataxxxx['fosfcant'] * 2;
        }
        $formulax[10] =  ($this->pesoxxxx * $this->dataxxxx['requdiar']) - $restaxxx; //SODIO CLORURO
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[10] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //SODIO CLORURO
        break;
      case 2:// neonatos
        $formulax[10] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //SODIO CLORURO
        break;
      case 3:
        $formulax[10] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //SODIO CLORURO
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[10] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 2; //SODIO CLORURO
        break;
      case 2:// neonatos
        $formulax[10] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 2; //SODIO CLORURO
        break;
      case 3:// adultos
        $formulax[10] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']/2; //SODIO CLORURO
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function sodio($dataxxxx, $medicame, $purgaxxx) {
    $this->dataxxxx = $dataxxxx;
    $this->medicame = $medicame->id;
    $this->casaxxxx = $medicame->casa->id;
    $this->purgaxxx = $purgaxxx;
    $this->requemientodiarionpt();
    $this->requemientototalnpt();
    $this->volumennpt();
    $this->purganpt();

    return $this->estructu[$this->casaxxxx];
  }

}
