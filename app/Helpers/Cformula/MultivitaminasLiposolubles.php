<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

/**
 * Calculos para la formulacion de las Multivitaminas Hidrosolubles
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class MultivitaminasLiposolubles {
  const FACTORXX = 0.099;
  private $estructu;
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
        $formulax[19] = (double)$this->dataxxxx['volumenx']*230;
        break;
      case 2: // neonatos
        $formulax[19] = (double)$this->dataxxxx['volumenx']*230;
        break;
      case 3: // adultos
        $formulax[18] = (double)$this->dataxxxx['volumenx'] * self::FACTORXX;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[19] = $this->dataxxxx['requdiar'];
        break;
      case 2:// neonatos
        $formulax[19] = $this->dataxxxx['requdiar'];
        break;
      case 3:// adultos
        // $formulax[18] = $this->dataxxxx['requdiar'] ;
        $formulax[18] = $this->dataxxxx['requdiar'] / self::FACTORXX;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[19] = (double)$this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] *  $this->purgaxxx;
        break;
      case 2:// neonatos
        $formulax[19] = (double)$this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] *  $this->purgaxxx;
        break;
      case 3:
        $formulax[18] = (double)$this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] *  $this->purgaxxx;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos

        $formulax[19] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']/230;
        break;
      case 2:// neonatos

        $formulax[19] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']/230;
        break;
      case 3:// adultos
        $formulax[18] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'];
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function liposoluble($dataxxxx, $medicame, $purgaxxx) {
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
