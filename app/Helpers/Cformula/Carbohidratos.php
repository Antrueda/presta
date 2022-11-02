<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

/**
 * Description of Carbohidratos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Carbohidratos {

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
        $formulax[8] = $this->dataxxxx['volumenx'] / 2 / $this->pesoxxxx / 1.44; //carbo
        $formulax[9] = $this->dataxxxx['volumenx'] / 10 / $this->pesoxxxx / 1.44; //carbo
        break;
      case 2: // neonatos
        $formulax[8] = $this->dataxxxx['volumenx'] / 2 / $this->pesoxxxx / 1.44; //carbo
        $formulax[9] = $this->dataxxxx['volumenx'] / 10 / $this->pesoxxxx / 1.44; //carbo
        break;
      case 3: // adultos
        $formulax[8] = $this->dataxxxx['volumenx'] / 2 / $this->pesoxxxx / 1.44; //carbo
        $formulax[9] = $this->dataxxxx['volumenx'] / 10 / $this->pesoxxxx / 1.44; //carbo
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[8] = $this->dataxxxx['requdiar'] * $this->pesoxxxx * 1.44; //f6 carbohidrato 50
        $formulax[9] = $this->dataxxxx['requdiar'] * $this->pesoxxxx * 1.44; //f7 carbohidrato 10
        break;
      case 2:// neonatos
        $formulax[8] = $this->dataxxxx['requdiar'] * $this->pesoxxxx * 1.44; //f6 carbohidrato 50
        $formulax[9] = $this->dataxxxx['requdiar'] * $this->pesoxxxx * 1.44; //f7 carbohidrato 10
        break;
      case 3:// adultos
        $formulax[8] = $this->dataxxxx['requdiar'] * $this->pesoxxxx * 1.44; //f6 carbohidrato 50
        $formulax[9] = $this->dataxxxx['requdiar'] * $this->pesoxxxx * 1.44; //f7 carbohidrato 10
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[8] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //f6 carbohidrato 50
        $formulax[9] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //f7 carbohidrato 10
        break;
      case 2:// neonatos
        $formulax[8] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //f6 carbohidrato 50
        $formulax[9] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //f7 carbohidrato 10
        break;
      case 3:
        $formulax[8] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //f6 carbohidrato 50
        $formulax[9] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx; //f7 carbohidrato 10
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt() {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1:// pediatricos
        $formulax[8] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 2; //CARBOHIDRATOS  DAD 50%
        $formulax[9] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //CARBOHIDRATOS  DAD 10%
        break;
      case 2:// neonatos
        $formulax[8] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 2; //CARBOHIDRATOS  DAD 50%
        $formulax[9] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //CARBOHIDRATOS  DAD 10%
        break;
      case 3:// adultos
        $formulax[8] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 2; //CARBOHIDRATOS  DAD 50%
        $formulax[9] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * 10; //CARBOHIDRATOS  DAD 10%
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function carbohidrato($dataxxxx, $medicame, $purgaxxx) {
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
