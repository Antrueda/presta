<?php

namespace App\Helpers\Cformula;

/**
 * Calculos para la formulacion de los Lipidos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Lipidos
{
  const FACTORX5 = 5;
  const FACTOR10 = 10;
  const FACTORX1 = 0.1;
  const FACTORX9 = 0.099;
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
        //   case 1: // pediatricos
        //     $formulax[26] = ($this->dataxxxx['volumenx'] / self::FACTORX5 + self::FACTORX1 * $this->dataxxxx['lipovolu']) / $this->pesoxxxx;
        //     $formulax[27] = ($this->dataxxxx['volumenx'] / self::FACTORX5 + self::FACTORX1 * $this->dataxxxx['lipovolu'] / self::FACTORX9) / $this->pesoxxxx;
        //     $formulax[28] = ($this->dataxxxx['volumenx'] / self::FACTOR10 + self::FACTORX1 * $this->dataxxxx['lipovolu'] / self::FACTORX9) / $this->pesoxxxx;
        //     break;
        //   case 2: // neonatos
        //     $formulax[26] = ($this->dataxxxx['volumenx'] / self::FACTORX5 + self::FACTORX1 * $this->dataxxxx['lipovolu']) / $this->pesoxxxx;
        //     $formulax[27] = ($this->dataxxxx['volumenx'] / self::FACTORX5 + self::FACTORX1 * $this->dataxxxx['lipovolu'] / self::FACTORX9) / $this->pesoxxxx;
        //     $formulax[28] = ($this->dataxxxx['volumenx'] / self::FACTOR10 + self::FACTORX1 * $this->dataxxxx['lipovolu'] / self::FACTORX9) / $this->pesoxxxx;
        //     break;

      case 1: // pediatricos
        // $formulax[26] = ($this->dataxxxx['volumenx']  + self::FACTORX1 * $this->dataxxxx['lipovolu']) / $this->pesoxxxx;
        // $formulax[27] = ($this->dataxxxx['volumenx']  + self::FACTORX1 * $this->dataxxxx['lipovolu'] ) / $this->pesoxxxx;
        // $formulax[28] = ($this->dataxxxx['volumenx']  + self::FACTORX1 * $this->dataxxxx['lipovolu'] ) / $this->pesoxxxx;

        $formulax[26] = ($this->dataxxxx['volumenx'] / self::FACTORX5) / $this->pesoxxxx;
        $formulax[27] = ($this->dataxxxx['volumenx'] / self::FACTORX5) / $this->pesoxxxx;
        $formulax[28] = ($this->dataxxxx['volumenx'] / self::FACTOR10) / $this->pesoxxxx;
        break;
      case 2: // neonatos
        $formulax[26] = ($this->dataxxxx['volumenx'] / self::FACTORX5) / $this->pesoxxxx;
        $formulax[27] = ($this->dataxxxx['volumenx'] / self::FACTORX5) / $this->pesoxxxx;
        $formulax[28] = ($this->dataxxxx['volumenx'] / self::FACTOR10) / $this->pesoxxxx;
        break;
      case 3: // adultos
        $formulax[26] = ($this->dataxxxx['volumenx'] / self::FACTORX5) / $this->pesoxxxx;
        $formulax[27] = ($this->dataxxxx['volumenx'] / self::FACTORX5) / $this->pesoxxxx;
        $formulax[28] = ($this->dataxxxx['volumenx'] / self::FACTOR10) / $this->pesoxxxx;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
  }

  private function requemientototalnpt()
  {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[26] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        $formulax[27] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        $formulax[28] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        break;
      case 2: // neonatos
        $formulax[26] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        $formulax[27] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        $formulax[28] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        break;
      case 3: // adultos
        $formulax[26] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        $formulax[27] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        $formulax[28] = $this->dataxxxx['requdiar'] * $this->pesoxxxx;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
  }

  private function purganpt()
  {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        $formulax[26] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        $formulax[27] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        $formulax[28] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        break;
      case 2: // neonatos
        $formulax[26] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        $formulax[27] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        $formulax[28] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        break;
      case 3:
        $formulax[26] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        $formulax[27] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        $formulax[28] = $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] * $this->purgaxxx;
        break;
    }
    $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
  }

  private function volumennpt()
  {
    $formulax = [];
    switch ($this->npt_idxx) {
      case 1: // pediatricos
        // $formulax[26] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] - self::FACTORX1 * $this->dataxxxx['lipovolu']) ;
        // $formulax[27] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] - self::FACTORX1 * $this->dataxxxx['lipovolu']) ;
        // $formulax[28] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] - self::FACTORX1 * $this->dataxxxx['lipovolu']) ;
        $formulax[26] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * self::FACTORX5);
        $formulax[27] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * self::FACTORX5);
        $formulax[28] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * self::FACTORX5);

        break;
      case 2: // neonatos
        // $formulax[26] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] - self::FACTORX1 * $this->dataxxxx['lipovolu']) * self::FACTORX5;
        // $formulax[27] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] - self::FACTORX1 * $this->dataxxxx['lipovolu']) * self::FACTORX5;
        // $formulax[28] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] - self::FACTORX1 * $this->dataxxxx['lipovolu']) * self::FACTORX5;
        $formulax[26] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']* self::FACTORX5) ;
        $formulax[27] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']* self::FACTORX5) ;
        $formulax[28] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal']* self::FACTORX5) ;

        break;
      case 3: // adultos
        $formulax[26] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * self::FACTORX5);
        $formulax[27] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * self::FACTORX5);
        $formulax[28] = ($this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] * self::FACTOR10);
        break;
    }

    $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
  }

  public function lipido($dataxxxx, $medicame, $purgaxxx)
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
