<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

/**
 * Description of Gluconatos
 * CALCIO GLUCONATO 10%
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Calcios {

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
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[12] = $this->dataxxxx['volumenx'] * 100 / $this->pesoxxxx; //CALCIO GLUCONATO 10%
        break;
      case 2: // neonatos
        $formulax[12] = $this->dataxxxx['volumenx'] * 100 / $this->pesoxxxx; //CALCIO GLUCONATO 10%
        break;
      case 3: // adultos
        $formulax[12] = $this->dataxxxx['volumenx'] * 9.2; //CALCIO GLUCONATO 10%
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[12] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //CALCIO GLUCONATO 10%
        break;
      case 2:// neonatos
        $formulax[12] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //CALCIO GLUCONATO 10%
        break;
      case 3:// adultos
        $formulax[12] = $this->dataxxxx['requdiar']; //CALCIO GLUCONATO 10%
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[12] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
        break;
      case 2:// neonatos
        $formulax[12] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
        break;
      case 3:
        $formulax[12] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[12] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 100;
        break;
      case 2:// neonatos
        $formulax[12] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 100;
        break;
      case 3:// adultos
        $formulax[12] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 9.2;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function calcio($dataxxxx, $medicame, $purgaxxx) {
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
