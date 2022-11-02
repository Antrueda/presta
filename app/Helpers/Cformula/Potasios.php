<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

use App\Models\Medicamentos\Medicame;

/**
 * Description of Potasios
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Potasios
{
    private $estructu;
    private $pesoxxxx;
    private $npt_idxx;
    private $medicame;
    private $casaxxxx;
    private $dataxxxx;
    private $purgaxxx;
    private $fosfatos;
    public function __construct($estructu, $pesoxxxx, $npt_idxx)
    {
        $this->estructu = $estructu;
        $this->pesoxxxx = $pesoxxxx;
        $this->npt_idxx = $npt_idxx;
        $this->medicame = 0;
        $this->casaxxxx = 0;
        $this->dataxxxx = [];
        $this->purgaxxx = 0;
        $this->volutota = 0;
        $this->fosfatos = new Fosfatos($estructu, $pesoxxxx, $npt_idxx);
    }
    /**
     * calcula requerimiento cuando se digita el volumen
     */
    private function requemientodiarionpt()
    {
        $factorxx = 0;
        switch ($this->dataxxxx['fosfa_id']) {
            case 6:
                $factorxx = 3.8;
                break;
            case 7:
                $factorxx = 2;
                break;
        }
        $formulax = [];
        $fosfcant = $this->dataxxxx['fosfcant'];
        if ($fosfcant == '') {
            $fosfcant = 0;
        }
        switch ($this->npt_idxx) {
            case 1: // pediatricos
                $calculox = $fosfcant * $this->pesoxxxx * $factorxx;
                $formulax[11] = ($this->dataxxxx['volumenx'] * 2 + $calculox) / $this->pesoxxxx; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $calculox = $fosfcant * $this->pesoxxxx * $factorxx;
                $formulax[11] = ($this->dataxxxx['volumenx'] * 2 + $calculox) / $this->pesoxxxx; //POTASIO CLORURO
                break;
            case 3: // adultos
                $calculox = $fosfcant * $factorxx;
                $formulax[11] = ($this->dataxxxx['volumenx'] * 2 + $calculox) / $this->pesoxxxx; //POTASIO CLORURO
                break;
        }
        $this->estructu[$this->casaxxxx][$this->medicame]['rediario'] = $formulax[$this->medicame];
    }

    private function requemientototalnpt()
    {
        $restasxx = 0;
        $medicame = Medicame::where('id', $this->dataxxxx['fosfa_id'])->first();
        $retolfos = 0;
        if ($this->dataxxxx['fosfcant'] != '') {
            $retolfos = $this->fosfatos->fosfato(
                ['volumenx' => 0, 'requdiar' => $this->dataxxxx['fosfcant']],
                $medicame,
                $this->purgaxxx
            )[$this->dataxxxx['fosfa_id']]['volumenx'];
        }
        switch ($this->dataxxxx['fosfa_id']) {
            case 6:
                if ($this->npt_idxx == 3) {
                    $restasxx = $retolfos * 3.6; //f9  potasio
                } else {
                    $restasxx = $retolfos * 3.8;
                }
                break;
            case 7:
                if ($this->npt_idxx == 3) {
                    $restasxx = $retolfos * 2; //f9  potasio
                } else {
                    $volumenx = ($this->dataxxxx['fosfcant'] * $this->pesoxxxx);
                    $restasxx = $volumenx > 0 ? $volumenx * 2 : 0; //f9  potasio
                }
                break;
        }
        $formulax = [];
        switch ($this->npt_idxx) {
            case 1: // pediatricos
                $formulax[11] = $this->pesoxxxx * $this->dataxxxx['requdiar'] - $restasxx; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $formulax[11] = $this->pesoxxxx * $this->dataxxxx['requdiar'] - $restasxx; //POTASIO CLORURO
                break;
            case 3: // adultos
                $formulax[11] = $this->pesoxxxx * $this->dataxxxx['requdiar'] - $restasxx; //POTASIO CLORURO
                break;
        }
        $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] = $formulax[$this->medicame];
    }

    private function purganpt()
    {
        $formulax = [];
        switch ($this->npt_idxx) {
            case 1: // pediatricos
                $formulax[11] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $formulax[11] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //POTASIO CLORURO
                break;
            case 3:
                $formulax[11] = $this->purgaxxx * $this->estructu[$this->casaxxxx][$this->medicame]['volumenx']; //POTASIO CLORURO
                break;
        }
        $this->estructu[$this->casaxxxx][$this->medicame]['purgaxxx'] = $formulax[$this->medicame];
    }
    // cuando se digita requerimiento diario
    /**
     * calcula el volumen cuando se digita el requerimiento diario
     */
    private function volumennpt()
    {
        $formulax = [];
        switch ($this->npt_idxx) {
            case 1: // pediatricos
                $formulax[11] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 2; //POTASIO CLORURO
                break;
            case 2: // neonatos
                $formulax[11] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 2; //POTASIO CLORURO
                break;
            case 3: // adultos
                $formulax[11] = $this->estructu[$this->casaxxxx][$this->medicame]['reqtotal'] / 2; //POTASIO CLORURO
                break;
        }
        $this->estructu[$this->casaxxxx][$this->medicame]['volumenx'] = $formulax[$this->medicame];
    }

    public function potasio($dataxxxx, $medicame, $purgaxxx)
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
