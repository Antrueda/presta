<?php

namespace App\Helpers\Cformula;

use App\Models\Formulaciones\Dfmlote;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;
use App\Traits\Cformula\CalculosFormulacion;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dataformulario
 *
 * @author Nowen21
 */
class Dataformulario
{
    use CalculosFormulacion;
    public function getDataxxx()
    {
        return $this->_dataxxx;
    }
    private static function getMedicamentosCasa($dataxxxx)
    {
        $medicame = Medicame::select('medicames.id', 'medicames.nombgene')
            ->join('mnpts', 'medicames.id', '=', 'mnpts.medicame_id')
            ->join('urangnpts', 'mnpts.urangnpt_id', '=', 'urangnpts.id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')

            ->where('urangnpts.npt_id', $dataxxxx['paciente']->npt_id)
            ->where('medicame_sis_clinica.sis_clinica_id', $dataxxxx['paciente']->sis_clinica->id)
            ->where('medicames.casa_id', $dataxxxx['casaidxx'])
            ->where('medicames.sis_esta_id', 1)
            ->get();

        $comboxxx = [];
        if ($dataxxxx['tipocomb']) {
            if ($dataxxxx['cabecera']) {
                if ($dataxxxx['ajaxxxxx']) {
                    $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
                } else {
                    $comboxxx = ['' => 'Seleccione'];
                }
            }
        }
        foreach ($medicame as $registro) {
            if ($dataxxxx['tipocomb']) {
                if ($dataxxxx['ajaxxxxx']) {
                    $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->nombgene];
                } else {
                    $comboxxx[$registro->id] = $registro->nombgene;
                }
            } else {
                $comboxxx[] = $registro->id;
            }
        }
        return $comboxxx;
    }
    private static function getCasaMedicamentos($dataxxxx, $casaidxx)
    {
        $tienemed = false;
        $medicame = Medicame::select('medicames.id', 'medicames.nombgene')
            ->join('mnpts', 'medicames.id', '=', 'mnpts.medicame_id')
            ->join('urangnpts', 'mnpts.urangnpt_id', '=', 'urangnpts.id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->where('urangnpts.npt_id', $dataxxxx['paciente']->npt_id)
            ->where('medicame_sis_clinica.sis_clinica_id', $dataxxxx['paciente']->sis_clinica->id)
            ->where('medicames.casa_id', $casaidxx)
            ->first();
        if (isset($medicame->id)) {
            $tienemed = true;
        }
        return $tienemed;
    }
    public static function getPintarFormulario($dataxxxx)
    {
        $formulacion = [];

        // listar las casas que apliquen
        $casasxxx = Casa::select('casas.id', 'casas.casa', 'unidmedi', 'nameidxx')
            ->orderBy('casas.ordecasa', 'ASC')->get();
        //    // recorre las casas
        $existexx = [
            // 'elemtraz', 'multivit', 'multiuno'
        ];
        $aguaxxxx = ['aguaeste'];
        $aguaeste = 0;
        foreach ($casasxxx as $key => $value) {
            if (Dataformulario::getCasaMedicamentos($dataxxxx, $value->id)) {
                $selevalu = '';
                $requerim = '';
                $volupurg = '';
                $volumenx = '';
                $requtota = '';
                // saber cuales son los medicames que aplican para la lista
                $dataxxxx['casaidxx'] = $value->id;
                $dataxxxx['cabecera'] = false;
                $dataxxxx['ajaxxxxx'] = false;
                $dataxxxx['tipocomb'] = true;
                $selelist = Dataformulario::getMedicamentosCasa($dataxxxx);
                $dataxxxx['tipocomb'] = false;
                $combo_id = Dataformulario::getMedicamentosCasa($dataxxxx);
                // cuando se pinta el formulario con datos
                if (isset($dataxxxx['furmulac']->id)) {
                    // todos los medicames formulados
                    foreach ($dataxxxx['furmulac']->dformulas as $valor) {
                        foreach ($combo_id as $combo) {
                            if ($valor->medicame_id == $combo) {
                                $selevalu = $valor->medicame_id;
                                $requerim = $valor->cantidad;
                                $requtota = $valor->rtotal;
                                $volumenx = number_format($valor->volumen, 2);
                                $volupurg = number_format($valor->purga, 2);
                            }
                        }
                    }
                }

                $pedineon = (in_array($value['nameidxx'], $existexx) == true && $dataxxxx['paciente']->npt_id < 3);
                $aguaeste = (in_array($value['nameidxx'], $aguaxxxx) == true);

                $formulacion[] = [
                    'casaxxxx' => $value['casa'],
                    'campo_id' => $value['nameidxx'], // nombre del campo con el que se guarda
                    'selelist' => $selelist,
                    'selevalu' => $selevalu,
                    'requerim' => $requerim,
                    'requtota' => $requtota,
                    'volumenx' => $volumenx,
                    'volupurg' => $volupurg,
                    'readonly' =>  $pedineon ? 'readonly' : ($aguaeste ? 'readonly' : ''),
                    ///'valorxxx' => 4,
                    'unidmedi' => $value->unidmedi,
                ];
            }
        }
        return $formulacion;
    }

    /**
     * Armar datasxxx con con cada una de las formulaciones medicas de la fomulacion
     *
     * @access public
     * @param $furmulac fomulacion que arma datasxxx
     */
    private function getDataCasa($dataxxxx)
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
        foreach ($cabecera->dformulas as $key => $dformula) {

            $formulacion[$dformula->medicame->casa_id] = $this->getDataCasa(['dformula' => $dformula]);
            $mmarcaxx = $dformula->medicame->mmarcas()->select(['osmorali', 'pesoespe'])->first();
            // $osmopeso = $this->osmolaridadypesoespecifico($dformula);
            $formulacion['osmolari'] += $mmarcaxx->osmorali * $dformula->purga; // calcular la osmolarida
            $formulacion['pesoespe'] += $mmarcaxx->pesoespe * $dformula->purga; // calcular el peso específico

        }
        return $formulacion;
    }

    public function calculos($cabecera)
    {

        $datasxxx = $this->armardata($cabecera);
        $this->_dataxxx['volutota'] = $cabecera->volumen; //volumen total
        $this->_dataxxx['veloinfu'] = $cabecera->velocidad; //velocidad de infusion
        $this->_dataxxx['pesoxxxx'] = $cabecera->peso; //velocidad de infusion
        $this->_dataxxx['velopurg'] = $cabecera->volumen + $cabecera->purga; //velocidad de infusion
        if ($cabecera->paciente->npt_id == 3) { // adultos
            $this->_dataxxx = $this->calculosadultos($this->_dataxxx, $datasxxx);
        } else { // neonato y pediatrico
            $this->_dataxxx = $this->calculosneopediatrico($this->_dataxxx, $datasxxx);
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

    private function casa($idcasaxx, $datasxxx)
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

    private function calculosadultos($calculos, $datasxxx)
    {
        //VOLUMEN DE LA MULTIVITAMIANA
        $volumult = isset($datasxxx[17]['volumenx']) ? $datasxxx[17]['volumenx'] : 0;

        $glutamin = isset($datasxxx[10]) ? $datasxxx[10]['requerim'] : 0;

        // CONCENTRACION DE PROTEINAS (%)
        $aminoaci = $this->casa(1, $datasxxx)['requerim'] + $glutamin;
        $calculos['concprot'] = (($aminoaci) / $calculos['volutota']) * 100;
        // CONCENTRACION DE CARBOHIDRATO (%)
        if (isset($datasxxx[3])) {
            $carbohid = $this->casa(3, $datasxxx);
            $calculos['concarbo'] = ($carbohid['requerim'] / $calculos['volutota']) * 100;
        } else {
            $calculos['concarbo'] = 0;
            $carbohid['requerim'] = 0;
        }
        //CONCENTRACIÓN DE L�?PIDOS (%)       (>1%)
        $lipidosx = $this->casa(16, $datasxxx)['requerim'];
        $calculos['conclipi'] = (($lipidosx) / $calculos['volutota']) * 100;
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

        $casaxxxy = $this->casa(2, $datasxxx)['volumenx'];
        $casaxxxy = ($casaxxxy * 31 / 1 / $calculos['volutota'] * 1000 / 31);
        $calculos['calcfosf'] = ($datasxxx[6]['volumenx'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) *
            $casaxxxy / 100;

        return $calculos;
    }

    private function calculosneopediatrico($calculos, $datasxxx)
    {
        //VOLUMEN DE LA MULTIVITAMIANA
        $volumult = $datasxxx[17]['volumenx'];
        // CONCENTRACION DE PROTEINAS (%)
        $aminoaci = $this->casa(1, $datasxxx)['requerim'];
        $calculos['concprot'] = (($aminoaci) / $calculos['volutota']) * 100;
        // CONCENTRACION DE CARBOHIDRATO (%)
        if (isset($datasxxx[3])) {
            $carbohid = $this->casa(3, $datasxxx);
            $calculos['concarbo'] = ($carbohid['requerim'] / $calculos['volutota']) * 100;
        } else {
            $calculos['concarbo'] = 0;
            $carbohid['requerim'] = 0;
        }
        //CONCENTRACIÓN DE L�?PIDOS (%)       (>1%)
        $lipidosx = $this->casa(16, $datasxxx)['requerim'];
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
        $calculos['calcfosf'] = ($datasxxx[6]['requtota'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) * ($this->casa(2, $datasxxx)['volumenx'] * 31 / 1 / $calculos['volutota'] * 1000 / 31) / 100;

        return $calculos;
    }
}
