<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

/**
 * Description of Aminoacidos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Aminoacidos {

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
    $formulax=[];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[1] = $this->dataxxxx['requdiar'] / 10 / $this->pesoxxxx; //f1 amino 10 aminino
        $formulax[3] = $this->dataxxxx['requdiar'] / 10 / $this->pesoxxxx; //pediatrico aminoacido
        break;
      case 2: // neonatos
        $formulax[1] = $this->dataxxxx['requdiar'] / 10 / $this->pesoxxxx; //f1 amino 10 aminino
        $formulax[3] = $this->dataxxxx['requdiar'] / 10 / $this->pesoxxxx; //pediatrico aminoacido
        break;
      case 3: // adultos
        $formulax[1] = $this->dataxxxx['requdiar'] / 10 / $this->pesoxxxx; //f1 amino 10 aminino
        $formulax[2] = $this->dataxxxx['requdiar'] / (100 / 15) / $this->pesoxxxx; //f1 amino 10 amino
        break;
    }
    // echo $this->medicame;
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt() {
    $formulax=[];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[1] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //f1 amino 10
        $formulax[3] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //f2 amino 15
        break;
      case 2:// neonatos
        $formulax[1] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //f1 amino 10
        $formulax[3] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //f2 amino 15
        break;
      case 3:// adultos
        $formulax[1] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //f1 amino 10
        $formulax[2] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //f2 amino 15
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt() {

    $formulax=[];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[1] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f1 amino 10
        $formulax[3] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f2 amino 15
        break;
      case 2:// neonatos
        $formulax[1] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f1 amino 10
      $formulax[3] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f2 amino 15
        break;
      case 3:
        $formulax[1] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f1 amino 10
        $formulax[2] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f2 amino 15
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt() {
    $formulax=[];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[1] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //AMINOÁCIDOS ADULTOS 10% S/E
        $formulax[2] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 6.7; //AMINOÁCIDOS ADULTOS 15% S/E
        $formulax[3] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //AMINOÁCIDO PEDIÁTRICO
        break;
      case 2:// neonatos
        $formulax[1] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //AMINOÁCIDOS ADULTOS 10% S/E
        $formulax[2] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 6.7; //AMINOÁCIDOS ADULTOS 15% S/E
        $formulax[3] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //AMINOÁCIDO PEDIÁTRICO
        break;
      case 3:// adultos
        $formulax[1] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //AMINOÁCIDOS ADULTOS 10% S/E
        $formulax[2] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 6.7; //AMINOÁCIDOS ADULTOS 15% S/E
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function aminoacido($dataxxxx, $medicame, $purgaxxx) {

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
