<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

/**
 * Description of Fosfatos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Fosfatos
{

  private $estructu;
  private $pesoxxxx;
  private $npt_idxx;
  private $medicame;
  private $casaxxxx;
  private $dataxxxx;
  private $purgaxxx;

  public function __construct($estructu, $pesoxxxx, $npt_idxx)
  {
    $this->estructu = $estructu;
    $this->pesoxxxx = $pesoxxxx;
    $this->npt_idxx = $npt_idxx;
    $this->medicame = 0;
    $this->casaxxxx = 0;
    $this->dataxxxx = [];
    $this->purgaxxx = 0;
  }

  private function requemientodiarionpt()
  {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[5] = $this->dataxxxx['volumenx']; // fosfato
        $formulax[6] = $this->dataxxxx['volumenx']  * 2.6; // fosfato
        $formulax[7] = $this->dataxxxx['volumenx'] ; //fosfato
        break;
      case 2: // neonatos
        $formulax[5] = $this->dataxxxx['volumenx'] ; // fosfato
        $formulax[6] = $this->dataxxxx['volumenx']  * 2.6; // fosfato
        $formulax[7] = $this->dataxxxx['volumenx'] ; //fosfato
        break;
      case 3: // adultos
        $formulax[5] = $this->dataxxxx['volumenx']; // fosfato
        $formulax[6] = $this->dataxxxx['volumenx'] * 2.6; // fosfato
        $formulax[7] = $this->dataxxxx['volumenx']; //fosfato
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt()
  {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[5] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
        $formulax[6] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
        $formulax[7] = $this->pesoxxxx * $this->dataxxxx['requdiar'];  //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
        break;
      case 2: // neonatos
        $formulax[5] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
        $formulax[6] = $this->pesoxxxx * $this->dataxxxx['requdiar']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
        $formulax[7] = $this->pesoxxxx * $this->dataxxxx['requdiar'];  //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
        break;
      case 3: // adultos
        $formulax[5] = $this->dataxxxx['requdiar']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
        $formulax[6] = $this->dataxxxx['requdiar']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
        $formulax[7] = $this->dataxxxx['requdiar'];  //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
        break;
    }

    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt()
  {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[5] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f3 fosfato glicerofosfato
        $formulax[6] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f4 fosfato corpaul
        $formulax[7] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f5 fostao pisa
        break;
      case 2: // neonatos
        $formulax[5] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f3 fosfato glicerofosfato
        $formulax[6] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f4 fosfato corpaul
        $formulax[7] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f5 fostao pisa
        break;
      case 3:
        $formulax[5] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f3 fosfato glicerofosfato
        $formulax[6] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f4 fosfato corpaul
        $formulax[7] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //f5 fostao pisa
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt()
  {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[5] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
        $formulax[6] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 2.6; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
        $formulax[7] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
        break;
      case 2: // neonatos
        $formulax[5] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
        $formulax[6] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 2.6; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
        $formulax[7] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)
        break;
      case 3: // adultos

        $formulax[5] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML
        $formulax[6] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] /2.6; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)
        $formulax[7] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)

        break;
    }

    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function fosfato($dataxxxx, $medicame, $purgaxxx)
  {
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
