<?php

namespace App\Helpers\Cformula;

/**
 * Calculos para la formulacion de los Magnesios
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Magnesios {

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
        $formulax[13] = ($this->dataxxxx['volumenx'] * 200)/$this->pesoxxxx;
        break;
      case 2: // neonatos
        $formulax[13] = ($this->dataxxxx['volumenx'] * 200)/$this->pesoxxxx;
        break;
      case 3: // adultos
        $formulax[13] = $this->dataxxxx['volumenx'] * 20;
        break;
    }
    // ddd($this->npt_idxx);
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[13] = $this->pesoxxxx * $this->dataxxxx['requdiar'];
        break;
      case 2:// neonatos
        $formulax[13] = $this->pesoxxxx * $this->dataxxxx['requdiar'];
        break;
      case 3:// adultos
        $formulax[13] = $this->dataxxxx['requdiar'];
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[13] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
        break;
      case 2:// neonatos
        $formulax[13] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
        break;
      case 3:
        $formulax[13] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[13] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 200;
        break;
      case 2:// neonatos
        $formulax[13] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 200;
        break;
      case 3:// adultos
        $formulax[13] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 19;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function magnesio($dataxxxx, $medicame, $purgaxxx) {
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
