<?php

namespace App\Helpers\Cformula;

/**
 * Calculos para la formulacion de los Elementos Trazas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class ElementosTrazas
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
                $formulax[17] = $this->dataxxxx['volumenx'] * 250 / $this->pesoxxxx;
                $formulax[14] = $this->dataxxxx['volumenx'] * 0.33;
                $formulax[15] = $this->dataxxxx['volumenx'] * 0.077;
                $formulax[16] = $this->dataxxxx['volumenx'];
                break;
            case 2: // neonatos
                $formulax[17] = $this->dataxxxx['volumenx'] * 250 / $this->pesoxxxx;
                $formulax[14] = $this->dataxxxx['volumenx'] * 0.33;
                $formulax[15] = $this->dataxxxx['volumenx'] * 0.077;
                $formulax[16] = $this->dataxxxx['volumenx'];
                break;
            case 3: // adultos
                $formulax[14] = $this->dataxxxx['volumenx'] * 0.33;
                $formulax[15] = $this->dataxxxx['volumenx'] * 0.077;
                $formulax[16] = $this->dataxxxx['volumenx'];
                break;
        }
        $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
    }

    private function requemientototalnpt()
    {
        $formulax = [];
        switch ($this->npt_idxx) {
            case 1: // pediatricos
                $formulax[14] = $this->dataxxxx['requdiar'];
                $formulax[15] = $this->dataxxxx['requdiar'];
                $formulax[16] = $this->dataxxxx['requdiar'];
                $formulax[17] = $this->pesoxxxx * $this->dataxxxx['requdiar'];
                break;
            case 2: // neonatos
                $formulax[14] = $this->dataxxxx['requdiar'];
                $formulax[15] = $this->dataxxxx['requdiar'];
                $formulax[16] = $this->dataxxxx['requdiar'];
                $formulax[17] = $this->pesoxxxx * $this->dataxxxx['requdiar'];
                break;
            case 3: // adultos
                $formulax[14] = $this->dataxxxx['requdiar'];
                $formulax[15] = $this->dataxxxx['requdiar'];
                $formulax[16] = $this->dataxxxx['requdiar'];
                break;
        }
        $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
    }

    private function purganpt()
    {
        $formulax = [];
        switch ($this->npt_idxx) {
            case 1: // pediatricos
                $formulax[14] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[15] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[16] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[17] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                break;
            case 2: // neonatos
                $formulax[14] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[15] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[16] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[17] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                break;
            case 3:
                $formulax[14] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[15] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                $formulax[16] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'];
                break;
        }
        $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
    }

    private function volumennpt()
    {
        $formulax = [];
        switch ($this->npt_idxx) {
            case 1: // pediatricos
                $formulax[14] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 0.33;
                $formulax[15] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 0.077;
                $formulax[16] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'];
                $formulax[17] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 250;
                break;
            case 2: // neonatos
                $formulax[14] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 0.33;
                $formulax[15] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 0.077;
                $formulax[16] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'];
                $formulax[17] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 250;
                break;
            case 3: // adultos

                $formulax[14] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 0.33;
                $formulax[15] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 0.077;
                $formulax[16] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'];
                break;
        }

        $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
    }

    public function elemento($dataxxxx, $medicame, $purgaxxx)
    {
        $this->dataxxxx = $dataxxxx;
        $this->medicame = $medicame->id;
        $this->casaxxxx = $medicame->casa->id;
        $this->purgaxxx = $purgaxxx;
        // if ($this->npt_idxx == 3) {
            $this->requemientodiarionpt();
        // }
        $this->requemientototalnpt();
        $this->volumennpt();
        $this->purganpt();
        return $this->estructu[$this->casaxxxx];
    }
}
