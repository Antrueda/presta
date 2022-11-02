<?php

namespace App\Traits\Cformula;

use App\Helpers\Cformula\Casas;

trait CalculosPediaTrait
{
    use PintarFormularioTrait;
    /**
     * Calcular osmolaridad y peso especifico por lote
     *
     * @access private
     * @param $formlote lotes que tiene la formulacion medica
     */
    private function osmolaridadypesoespecifico($formlote)
    {

        $osmolari = 0;
        $pesoespe = 0;
        $purgaxxx = $formlote->purga;
        // recorrer cada uno de los lotes los que se le desconto el volumen de la formulacion medica
        foreach ($formlote->dfmlotes as $key => $lotexxxx) {
            $volumenx = $lotexxxx->volumenx; // volumen consumido por cada lote
            $osmolari += $volumenx / $purgaxxx * $lotexxxx->mlote->minvima->mmarca->osmorali; //osmolaridad por cada uno de los lotes
            $pesoespe += $volumenx / $purgaxxx * $lotexxxx->mlote->minvima->mmarca->pesoespe; // peso especifico por cada uno de los lotes
        }
        return ['osmolari' => $osmolari, 'pesoespe' => $pesoespe];
    }
    /**
     * Armar datasxxx con con cada una de las formulaciones medicas de la fomulacion
     *
     * @access public
     * @param $furmulac fomulacion que arma datasxxx
     */
    private function getDataCasaCT($dataxxxx)
    {
        return [
            'casaxxxx' => $dataxxxx['dformula']->medicame->casa->nombre, // nombre de la casa
            'selevalu' => $dataxxxx['dformula']->medicame_id, // id casa seleccionada
            'requerim' => $dataxxxx['dformula']->rtotal, // requrimiento total del medicame
            'requtota' => $dataxxxx['dformula']->cantidad, // cantidad digitada
            'volumenx' => $dataxxxx['dformula']->volumen, // volumen del medicame solicitado
            'nombgene' => $dataxxxx['dformula']->medicame->nombgene // nombre del medicame
        ];
    }
    private function armardata($cabecera)
    {
        $formulacion = ['osmolari' => 0, 'pesoespe' => 0];
        // recorrer cada una de las formulaciones medicas
        foreach ($cabecera->dformulas as $key => $formulacionmed) {

            $formulacion[$formulacionmed->medicame->casa_id] = $this->getDataCasaCT(['dformula' => $formulacionmed]);
            if ($cabecera->userevis_id) {
                $osmopeso = $this->osmolaridadypesoespecifico($formulacionmed);
                $formulacion['osmolari'] += $osmopeso['osmolari'] * $formulacionmed->purga; // calcular la osmolarida
                $formulacion['pesoespe'] += $osmopeso['pesoespe'] * $formulacionmed->purga; // calcular el peso específico
            }
        }
        return $formulacion;
    }
    private function casaCT($idcasaxx, $datasxxx)
    {
        $casasxxx = new Casas();
        $requtota = 0;
        $medicame = $datasxxx[$idcasaxx];
        switch ($idcasaxx) {
            case 1: // casa de los aminoacidos
                $requtota = $casasxxx->aminoacidos($medicame, $datasxxx);
                break;
            case 2: // casa de los fosfatos
                $requtota = $casasxxx->fosfatos($medicame, $datasxxx);
                break;
            case 3: // casa carbohidratos
                $requtota = $casasxxx->carbohidratos($medicame, $datasxxx);
                break;
            case 16: // casa lipidos
                $requtota = $casasxxx->lipidos($medicame, $datasxxx);
                break;
        }
        return $requtota;
    }

    private function calculosadultosCT($calculos, $datasxxx)
    {
        //VOLUMEN DE LA MULTIVITAMIANA
        $volumult = isset($datasxxx[17]['volumenx']) ? $datasxxx[17]['volumenx'] : 0;

        $glutamin = isset($datasxxx[10]) ? $datasxxx[10]['requerim'] : 0;

        // CONCENTRACION DE PROTEINAS (%)
        $aminoaci = $this->casaCT(1, $datasxxx)['requerim'] + $glutamin;
        $calculos['concprot'] = (($aminoaci) / $calculos['volutota']) * 100;
        // CONCENTRACION DE CARBOHIDRATO (%)
        if (isset($datasxxx[3])) {
            $carbohid = $this->casaCT(3, $datasxxx);
            $calculos['concarbo'] = ($carbohid['requerim'] / $calculos['volutota']) * 100;
        } else {
            $calculos['concarbo'] = 0;
            $carbohid['requerim'] = 0;
        }
        //CONCENTRACIÓN DE L�?PIDOS (%)       (>1%)
        $lipidosx = $this->casaCT(16, $datasxxx)['requerim'];
        $calculos['conclipi'] = (($lipidosx + $volumult / 5) / $calculos['volutota']) * 100;
        //GRAMOS TOTALES DE NITROGENO
        $calculos['gramtota'] = $aminoaci / 6.25;
        //CALORIAS PROTEICAS 						2%
        $calculos['caloprot'] = $aminoaci * 4;
        //CALORIAS CARBOHIDRATOS 						9%
        $calculos['calocarb'] = $carbohid['requerim'] * 3.4;
        //CALORIAS LIPIDOS 89%
        $calculos['calolipi'] = $lipidosx * 9 + $volumult * 1.12;
        //CALORIAS TOTALES 						100%
        $calculos['calotota'] = $calculos['caloprot'] + $calculos['calocarb'] + $calculos['calolipi'];
        //relación: Cal No proteícas/g Nitrogeno
        if ($calculos['gramtota'] == 0) {
            $calculos['protnitr'] = 0;
        } else {
            $calculos['protnitr'] = ($calculos['calolipi'] + $calculos['calocarb']) / $calculos['gramtota'];
        }

        //Relación: Cal No proteícas/g A.A
        if ($aminoaci == 0) {
            $calculos['proteica'] = 0;
        } else {
            $calculos['proteica'] = ($calculos['calolipi'] + $calculos['calocarb']) / $aminoaci;
        }

        //Calorías totales/Kg./día
        $calculos['caltotkg'] = $calculos['calotota'] / $calculos['pesoxxxx'];
        //RELACIÓN CALCIO/FOSFÓRO                 (<2)
        $calculos['calcfosf'] = ($datasxxx[6]['requtota'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) * ($this->casaCT(2, $datasxxx)['volumenx'] * 31 / 1 / $calculos['volutota'] * 1000 / 31) / 100;
        return $calculos;
    }

    private function calculosneopediatricoCT($calculos, $datasxxx)
    {
        //VOLUMEN DE LA MULTIVITAMIANA
        $volumult = $datasxxx[17]['volumenx'];
        // CONCENTRACION DE PROTEINAS (%)
        $aminoaci = $this->casaCT(1, $datasxxx)['requerim'];
        $calculos['concprot'] = (($aminoaci) / $calculos['volutota']) * 100;
        // CONCENTRACION DE CARBOHIDRATO (%)
        if (isset($datasxxx[3])) {
            $carbohid = $this->casaCT(3, $datasxxx);
            $calculos['concarbo'] = ($carbohid['requerim'] / $calculos['volutota']) * 100;
        } else {
            $calculos['concarbo'] = 0;
            $carbohid['requerim'] = 0;
        }
        //CONCENTRACIÓN DE L�?PIDOS (%)       (>1%)
        $lipidosx = $this->casaCT(16, $datasxxx)['requerim'];
        $calculos['conclipi'] = (($lipidosx + $volumult / 5) / $calculos['volutota']) * 100;
        //GRAMOS TOTALES DE NITROGENO
        $calculos['gramtota'] = $aminoaci / 6.25;
        //CALORIAS PROTEICAS 						2%
        $calculos['caloprot'] = $aminoaci * 4;
        //CALORIAS CARBOHIDRATOS 						9%
        $calculos['calocarb'] = $carbohid['requerim'] * 3.4;
        //CALORIAS LIPIDOS 89%
        $calculos['calolipi'] = $lipidosx * 9 + $volumult * 1.12;
        //CALORIAS TOTALES 						100%
        $calculos['calotota'] = $calculos['caloprot'] + $calculos['calocarb'] + $calculos['calolipi'];
        //relación: Cal No proteícas/g Nitrogeno
        $calculos['protnitr'] = ($calculos['calolipi'] + $calculos['calocarb']) / $calculos['gramtota'];
        //Relación: Cal No proteícas/g A.A
        $calculos['proteica'] = ($calculos['calolipi'] + $calculos['calocarb']) / $aminoaci;
        //Calorías totales/Kg./día
        $calculos['caltotkg'] = $calculos['calotota'] / $calculos['pesoxxxx'];
        //RELACIÓN CALCIO/FOSFÓRO                 (<2)
        $calculos['calcfosf'] = ($datasxxx[6]['requtota'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) * ($this->casaCT(2, $datasxxx)['volumenx'] * 31 / 1 / $calculos['volutota'] * 1000 / 31) / 100;

        return $calculos;
    }

    public function getCalculosCT($cabecera)
    {
        $datasxxx = $this->armardata($cabecera);
        $this->_dataxxx['volutota'] = $cabecera->volumen; //volumen total
        $this->_dataxxx['veloinfu'] = $cabecera->velocidad; //velocidad de infusion
        $this->_dataxxx['pesoxxxx'] = $cabecera->peso; //velocidad de infusion
        $this->_dataxxx['velopurg'] = $cabecera->volumen + $cabecera->purga; //velocidad de infusion
        if ($cabecera->paciente->npt_id == 3) { // adultos
            $this->_dataxxx = $this->calculosadultosCT($this->_dataxxx, $datasxxx);
        } else { // neonato y pediatrico
            $this->_dataxxx = $this->calculosneopediatricoCT($this->_dataxxx, $datasxxx);
        }
        $this->_dataxxx['carbvali'] = $this->_dataxxx['concarbo'] > 24.5 ? 'ADVER/R.H�?GADO GRASO' : ($this->_dataxxx['concarbo'] < 24.4 ? 'SEGURA' : '');
        $this->_dataxxx['concprov'] = $this->_dataxxx['concprot'] < 1 ? 'NO ESTABLE' : 'ESTABLE';
        $this->_dataxxx['conclipv'] = ($this->_dataxxx['conclipi'] < 1 && $this->_dataxxx['conclipi'] != 0) ? 'NO ESTABLE' : 'ESTABLE';
        $this->_dataxxx['osmolari'] = $datasxxx['osmolari'] / $this->_dataxxx['velopurg']; //OSMOLARIDAD (mOsm / L)
        $this->_dataxxx['osmolarv'] = $this->_dataxxx['osmolari'] > 700 ? 'VIA CENTRAL' : 'VIA PERIFÉRICA';
        $this->_dataxxx['calcfosv'] = $this->_dataxxx['calcfosf'] < 2 ? 'SEGURA' : 'NO SEGURA';
        $this->_dataxxx['calototv'] = $this->_dataxxx['calotota'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['calocarv'] = $this->_dataxxx['calocarb'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['calolipv'] = $this->_dataxxx['calolipi'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['caloprov'] = $this->_dataxxx['caloprot'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['pesoteor'] = $datasxxx['pesoespe']; //PESO TEORICO  (GRAMOS)
        return $this->_dataxxx;
    }
}
