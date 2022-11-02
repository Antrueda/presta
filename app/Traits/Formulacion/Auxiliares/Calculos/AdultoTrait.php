<?php


namespace App\Traits\Formulacion\Auxiliares\Calculos;

/**
 *  Calculos para la formulacion de los Acidos
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
trait AdultoTrait
{
    private function getAdultosAT()
    {
        //VOLUMEN DE LA MULTIVITAMIANA
        $vitahidr = 0;
        if (isset($this->formulac['vitalipo'])) {
            $vitahidr = $this->formulac['vitalipo']['volumenx'];
        }
        $glutamin = 0;
        if (isset($this->formulac['glutamin'])) {
            $glutamin = $this->formulac['glutamin']['reqtotal'];
        }

        // CONCENTRACION DE PROTEINAS (%)
        $aminoaci = 0;
        if (isset($this->formulac['aminoaci'])) {
            $aminoaci = $this->formulac['aminoaci']['reqtotal'];
        }
        $aminoaci =  $aminoaci + $glutamin;
        $this->_dataxxx['concprot'] = (($aminoaci) / $this->_dataxxx['volutota']) * 100;
        // CONCENTRACION DE CARBOHIDRATO (%)
        if (isset($this->formulac['carbohid'])) {
            $carbohid=$this->formulac['carbohid']['reqtotal'];
            $this->_dataxxx['concarbo'] = ($carbohid / $this->_dataxxx['volutota']) * 100;
        } else {
            $this->_dataxxx['concarbo'] = 0;
            $carbohid = 0;
        }
        //CONCENTRACIÓN DE L�?PIDOS (%)       (>1%)
        $lipidosx =0;
        if (isset($this->formulac['lipidosx'])) {
            $lipidosx =  $this->formulac['lipidosx']['reqtotal'];
        }
        // $this->_dataxxx['conclipi'] = (($lipidosx + $volumult / 5) / $this->_dataxxx['volutota']) * 100;
        $this->_dataxxx['conclipi'] = (($lipidosx) / $this->_dataxxx['volutota']) * 100;
        //GRAMOS TOTALES DE NITROGENO
        $this->_dataxxx['gramtota'] = $aminoaci / 6.25;
        //CALORIAS PROTEICAS 						2%
        $this->_dataxxx['caloprot'] = $aminoaci * 4;
        //CALORIAS CARBOHIDRATOS 						9%
        $this->_dataxxx['calocarb'] = $carbohid * 3.4;
        //CALORIAS LIPIDOS 89%
        $this->_dataxxx['calolipi'] = $lipidosx * 9 + $vitahidr * 1.12;
        //CALORIAS TOTALES 						100%
        $this->_dataxxx['calotota'] = $this->_dataxxx['caloprot'] + $this->_dataxxx['calocarb'] + $this->_dataxxx['calolipi'];
        //relación: Cal No proteícas/g Nitrogeno
        if ($this->_dataxxx['gramtota'] == 0) {
            $this->_dataxxx['protnitr'] = 0;
        } else {
            $this->_dataxxx['protnitr'] = ($this->_dataxxx['calolipi'] + $this->_dataxxx['calocarb']) / $this->_dataxxx['gramtota'];
        }

        //Relación: Cal No proteícas/g A.A
        if ($aminoaci == 0) {
            $this->_dataxxx['proteica'] = 0;
        } else {
            $this->_dataxxx['proteica'] = ($this->_dataxxx['calolipi'] + $this->_dataxxx['calocarb']) / $aminoaci;
        }

        //Calorías totales/Kg./día
        $this->_dataxxx['caltotkg'] = $this->_dataxxx['calotota'] / $this->_dataxxx['pesoxxxx'];
        //RELACIÓN CALCIO/FOSFÓRO                 (<2)

        $calcioxx=0;
        if (isset($this->formulac['calcioxx']['volumenx'])) {
            $calcioxx=$this->formulac['calcioxx']['volumenx'];
        }
        $fosfatox=0;
        if (isset($this->formulac['fosfatox'])) {
            $fosfatox=$this->formulac['fosfatox']['volumenx'];
        }
        $this->_dataxxx['calcfosf'] = ($calcioxx * 9.3 / 1 / $this->_dataxxx['volutota'] * 1000 / 40) * ($fosfatox * 31 / 1 / $this->_dataxxx['volutota'] * 1000 / 31) / 100;
    }
}
