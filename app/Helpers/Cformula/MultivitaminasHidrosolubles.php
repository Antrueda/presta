<?php

namespace App\Helpers\Cformula;

/**
 * Calculos para la formulacion de las Multivitaminas Liposolubles
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class MultivitaminasHidrosolubles {

  private $estructu;
  private $factor20;
  private $factor30;
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
    $this->factor20=0.04;
    $this->factor30=0.099;
  }

  private function requemientodiarionpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[20] = (double)$this->dataxxxx['volumenx']*40;
        break;
      case 2: // neonatos
        $formulax[20] = (double)$this->dataxxxx['volumenx']*40;
        break;
      case 3: // adultos
        $formulax[20] = (double)$this->dataxxxx['volumenx'] * $this->factor20;
        $formulax[30] = (double)$this->dataxxxx['volumenx'] * $this->factor30;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[20] = $this->dataxxxx['requdiar'];
        break;
      case 2:// neonatos
        $formulax[20] = $this->dataxxxx['requdiar'];
        break;
      case 3:// adultos
        $formulax[20] = $this->dataxxxx['requdiar']/ $this->factor20;
        $formulax[30] = $this->dataxxxx['requdiar']/ $this->factor30;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[20] = (double)$this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        break;
      case 2:// neonatos
        $formulax[20] = (double)$this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        break;
      case 3:
        $formulax[20] = (double)$this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        $formulax[30] = (double)$this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[20] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']/40;
        break;
      case 2:// neonatos
        $formulax[20] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']/40;
        break;
      case 3:// adultos
        $formulax[20] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'];
        $formulax[30] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'];
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function hidrosoluble($dataxxxx, $medicame, $purgaxxx) {
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
