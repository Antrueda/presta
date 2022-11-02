<?php

namespace App\Traits\Cformula;

use App\Helpers\Cformula\Casas;
use App\Helpers\Cformula\CasasFormulacion;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Mmarca;

trait CalculosAjaxTrait
{
    use PintarFormularioTrait;
    private $_datacat = [
        "clinicax" => "",
        "tiempoxx" => "",
        "volutota" => "",
        "purgaxxx" => "",
        "pesoxxxx" => "",
        "nptidxxx" => "",
        "velopurg" => "",
        "veloinfu" => "",
        "concarbo" => "",
        "concprot" => "",
        "conclipi" => "",
        "osmolari" => "",
        "gramtota" => "",
        "protnitr" => "",
        "proteica" => "",
        "caloprot" => "",
        "calolipi" => "",
        "calocarb" => "",
        "calotota" => "",
        "caltotkg" => "",
        "calcfosf" => "",
        "carbvali" => "",
        "concprov" => "",
        "conclipv" => "",
        "osmolarv" => "",
        "calcfosv" => "",
        "calototv" => "",
        "calocarv" => "",
        "calolipv" => "",
        "caloprov" => "",
        "pesoteor" => "",

    ];
    /**
     * Este metodo se utiliza como ejemplo para ver y armar la estructura del array con el que se van a ralizar los cálculos
     *
     * @return  $dataxxxx
     */
    public function getData()
    {
        $dataxxxx =

            [
                'dataxxxx' =>

                [
                    ["name" => "_token", "value" => "V9T68NKKMN1dYqVA0uxEqJN1wjf99Racmtlrloqv"],
                    ["name" => "sis_clinica_id", "value" => "42"],
                    ["name" => "tiempo", "value" => "24"],
                    ["name" => "velocidad", "value" => "55.5"],
                    ["name" => "volumen", "value" => "243.8"],
                    ["name" => "purga", "value" => "40"],
                    ["name" => "peso", "value" => "18"],
                    ["name" => "aminoaci", "value" => "1"],
                    ["name" => "aminoaci_cant", "value" => "2"],
                    ["name" => "aminoaci_volu", "value" => "360"],
                    ["name" => "aminoaci_vopu", "value" => "370.8"],
                    ["name" => "fosfatox", "value" => "5"],
                    ["name" => "fosfatox_cant", "value" => "3.6"],
                    ["name" => "fosfatox_volu", "value" => "3.6"],
                    ["name" => "fosfatox_vopu", "value" => "3.7"],
                    ["name" => "carbohid", "value" => "8"],
                    ["name" => "carbohid_cant", "value" => "5.8"],
                    ["name" => "carbohid_volu", "value" => "300.67"],
                    ["name" => "carbohid_vopu", "value" => "309.7"],
                    ["name" => "sodioxxx", "value" => "10"],
                    ["name" => "sodioxxx_cant", "value" => "3"],
                    ["name" => "sodioxxx_volu", "value" => "23.4"],
                    ["name" => "sodioxxx_vopu", "value" => "24.1"],
                    ["name" => "potasiox", "value" => "11"],
                    ["name" => "potasiox_cant", "value" => "2"],
                    ["name" => "potasiox_volu", "value" => "18"],
                    ["name" => "potasiox_vopu", "value" => "18.5"],
                    ["name" => "calcioxx", "value" => "12"],
                    ["name" => "calcioxx_cant", "value" => "16"],
                    ["name" => "calcioxx_volu", "value" => "2.88"],
                    ["name" => "calcioxx_vopu", "value" => "3"],
                    ["name" => "magnesio", "value" => "13"],
                    ["name" => "magnesio_cant", "value" => "2.44"],
                    ["name" => "magnesio_volu", "value" => "0.22"],
                    ["name" => "magnesio_vopu", "value" => "0.2"],
                    ["name" => "elemtraz", "value" => "17"],
                    ["name" => "elemtraz_cant", "value" => "69.44"],
                    ["name" => "elemtraz_volu", "value" => "5"],
                    ["name" => "elemtraz_vopu", "value" => "5.2"],
                    ["name" => "vitahidr", "value" => "20"],
                    ["name" => "vitahidr_cant", "value" => "400"],
                    ["name" => "vitahidr_volu", "value" => "10"],
                    ["name" => "vitahidr_vopu", "value" => "10.3"],
                    ["name" => "acidfoli", "value" => "24"],
                    ["name" => "acidfoli_cant", "value" => ""],
                    ["name" => "acidfoli_volu", "value" => ""],
                    ["name" => "acidfoli_vopu", "value" => ""],
                    ["name" => "vitamink", "value" => "25"],
                    ["name" => "vitamink_cant", "value" => ""],
                    ["name" => "vitamink_volu", "value" => ""],
                    ["name" => "vitamink_vopu", "value" => ""],
                    ["name" => "lipidosx", "value" => "26"],
                    ["name" => "lipidosx_cant", "value" => "2"],
                    ["name" => "lipidosx_volu", "value" => "180"],
                    ["name" => "lipidosx_vopu", "value" => "185.4"],
                    ["name" => "vitalipo", "value" => "19"],
                    ["name" => "vitalipo_cant", "value" => "2300"],
                    ["name" => "vitalipo_volu", "value" => "10"],
                    ["name" => "vitalipo_vopu", "value" => "10.3"],
                    ["name" => "aguaeste", "value" => "29"],
                    ["name" => "aguaeste_cant", "value" => ""],
                    ["name" => "aguaeste_volu", "value" => "418.22"],
                    ["name" => "aguaeste_vopu", "value" => ""],
                    ["name" => "npt_id", "value" => "2"],
                    ["name" => "compejob", "value" => "22"],
                    ["name" => "compejob_cant", "value" => ""],
                    ["name" => "compejob_volu", "value" => ""],
                    ["name" => "compejob_vopu", "value" => ""],
                    ["name" => "vitaminc", "value" => "21"],
                    ["name" => "vitaminc_cant", "value" => ""],
                    ["name" => "vitaminc_volu", "value" => ""],
                    ["name" => "vitaminc_vopu", "value" => ""],
                ],
                'campo_id' => 'aminoaci_cant',
                '_token' => '3fiupRYqdP44f6f2udhmVBjhgNHCsRXXu2BZFaZP',
                2 => ''
            ];
        return $dataxxxx;
    }




    /**
     * Armar datasxxx con con cada una de las formulaciones medicas de la fomulacion
     *
     * @access public
     * @param $furmulac fomulacion que arma datasxxx
     */
    private function getDataCasa($dataxxxx)
    {

        $requdiar = $dataxxxx['dataxxxx'][$dataxxxx['campoxxx'][0] . '_cant'];
        /**
         * encontra el requerimiento diario del volumen digitado
         */
        if (
            $dataxxxx['medisele'] == $dataxxxx['campoxxx'][0] . '_volu' &&
            $dataxxxx['dataxxxx'][$dataxxxx['campoxxx'][0] . '_volu'] > 0
        ) {


            $requdiar = $dataxxxx['dataxxxx'][$dataxxxx['campoxxx'][0] . '_volu'];
        }


        $dataxxxy = [
            'medisele' => $dataxxxx['medicame']->id, // mediamento seleccionado
            'requdiar' => $requdiar, // requerimineto diario por el mendicamento seleccionado
            'fosfa_id' => $dataxxxx['dataxxxx']['fosfatox'], // fosfato seleccionado
            'fosfcant' => $dataxxxx['dataxxxx']['fosfatox_cant'], // requerimiento diario del fosfato del fosfato seleccionado
            'multivi2' => $dataxxxx['dataxxxx']['vitalipo_cant'], // multivitamina liposoluble seleccionada
            'lipovolu' => $dataxxxx['dataxxxx']['vitalipo_volu'], // multivitamina liposoluble seleccionada
            'volumenx' => $dataxxxx['dataxxxx'][$dataxxxx['campoxxx'][0] . '_volu'],
        ];


        $formulax = $dataxxxx['casaform']->calculos($dataxxxy)[$dataxxxx['medicame']->id];

        if (
            $dataxxxx['medisele'] == $dataxxxx['campoxxx'][0] . '_volu' &&
            $dataxxxx['dataxxxx'][$dataxxxx['campoxxx'][0] . '_volu'] > 0
        ) {
            $dataxxxy['requdiar'] = $formulax['rediario'];
        }
        // $formulax = $dataxxxx['casaform']->calculos($dataxxxy)[$dataxxxx['medicame']->id];

        return [
            'casaxxxx' => $dataxxxx['medicame']->casa->casa, // nombre de la casa
            'selevalu' => $dataxxxx['medicame']->id, // id casa seleccionada
            'requerim' => $formulax['reqtotal'], // requrimiento total del medicame
            'requtota' => $dataxxxy['requdiar'], // cantidad digitada
            'volumenx' => $formulax['volumenx'], // volumen del medicame solicitado
            'nombgene' => $dataxxxx['medicame']->nombgene, // nombre del medicame
            'formulax' => $formulax
        ];
    }
    /**
     * se convierte el array que se captura del formulario para que se adapete a un array asociativo con nombre del campo y el valor
     *
     * @param array $cabecera
     * @return $formulacion
     */
    private function getArmarData($cabecera)
    {

        $formulacion = ['osmolari' => 0, 'pesoespe' => 0];
        $dataxxxx = [];
        foreach ($cabecera['dataxxxx'] as $registro) {
            $dataxxxx[$registro['name']] = $registro['value'] == '' ? 0 : $registro['value'];
        }
        $this->_datacat['clinicax'] = $dataxxxx['sis_clinica_id'];
        $this->_datacat['tiempoxx'] = $dataxxxx['tiempo'];
        $this->_datacat['veloinfu'] = $dataxxxx['velocidad']; //velocidad de infusion
        $this->_datacat['volutota'] = $dataxxxx['volumen']; //volumen
        $this->_datacat['purgaxxx'] = $dataxxxx['purga']; //purga
        $this->_datacat['pesoxxxx'] = $dataxxxx['peso']; //peso
        $this->_datacat['nptidxxx'] = $dataxxxx['npt_id']; //velocidad de infusion
        $this->_datacat['velopurg'] = $this->_datacat['volutota'] + $this->_datacat['purgaxxx']; //volumen con purga
        $formulacion['cabecera'] = [
            'sis_clinica_id' => $dataxxxx['sis_clinica_id'],
            'tiempo' => $dataxxxx['tiempo'],
            'velocidad' => $dataxxxx['velocidad'],
            'volumen' => $dataxxxx['volumen'],
            'purga' => $dataxxxx['purga'],
            'peso' => $dataxxxx['peso'],
            'npt_id' => $dataxxxx['npt_id'],
        ];

        $casaform = new CasasFormulacion($formulacion['cabecera']);
        foreach ($dataxxxx as $key => $registro) {
            $campoxxx = explode('_', $key);
            if (count($campoxxx) == 2 && $campoxxx[1] == 'cant') {
                $medicame = Medicame::find($dataxxxx[$campoxxx[0]]);
                $formulacion[$medicame->casa_id] = $this->getDataCasa(
                    [
                        'dataxxxx' => $dataxxxx,
                        'medicame' => $medicame,
                        'casaform' => $casaform,
                        'campoxxx' => $campoxxx,
                        'medisele' => $cabecera['campo_id']
                    ]
                );
                if ($dataxxxx[$key] > 0 && $campoxxx[0]!='aguaeste') {
                    $osmolari = $medicame->mmarcas->first()->osmorali * (double)$dataxxxx[$campoxxx[0] . '_vopu'];
                    $formulacion['osmolari'] += $osmolari; // calcular la osmolarida
                    $pesoespe = $medicame->mmarcas->first()->pesoespe * (double)$dataxxxx[$campoxxx[0] . '_vopu'];
                    $formulacion['pesoespe'] += $pesoespe; // calcular el peso específico
                }
            }
        }
// ddd($formulacion);
        return $formulacion;
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
        // $calculos['conclipi'] = (($lipidosx + $volumult / 5) / $calculos['volutota']) * 100;
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

        $calculos['calcfosf'] = ($datasxxx[6]['volumenx'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) * ($this->casa(2, $datasxxx)['volumenx'] * 31 / 1 / $calculos['volutota'] * 1000 / 31) / 100;

        return $calculos;
    }

    private function calculosneopediatrico($calculos, $datasxxx)
    {

        //VOLUMEN DE LA MULTIVITAMIANA
        $vitahidr = $datasxxx[17]['volumenx'];

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

        $calculos['conclipi'] = (($lipidosx + $vitahidr / 5) / $calculos['volutota']) * 100;
        //GRAMOS TOTALES DE NITROGENO
        $calculos['gramtota'] = $aminoaci / 6.25;
        //CALORIAS PROTEICAS 						2%
        $calculos['caloprot'] = $aminoaci * 4;
        //CALORIAS CARBOHIDRATOS 						9%
        $calculos['calocarb'] = $carbohid['requerim'] * 3.4;
        //CALORIAS LIPIDOS 89%
        $calculos['calolipi'] = $lipidosx * 9 + $vitahidr * 1.12;
        //CALORIAS TOTALES 						100%
        $calculos['calotota'] = $calculos['caloprot'] + $calculos['calocarb'] + $calculos['calolipi'];
        //relación: Cal No proteícas/g Nitrogeno
        $calculos['protnitr'] = ($calculos['gramtota'] == 0) ? 0 : (($calculos['calolipi'] + $calculos['calocarb']) / $calculos['gramtota']);
        //Relación: Cal No proteícas/g A.A
        $calculos['proteica'] = $aminoaci == 0 ? 0 : ($calculos['calolipi'] + $calculos['calocarb']) / $aminoaci;
        //Calorías totales/Kg./día
        $calculos['caltotkg'] = $calculos['calotota'] / $calculos['pesoxxxx'];
        //RELACIÓN CALCIO/FOSFÓRO                 (<2)
        $variablx = ($datasxxx[6]['volumenx'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40);

        $variablz = 31 / 1 / $calculos['volutota'] * 1000 / 31;

        $variably = ($this->casa(2, $datasxxx)['volumenx'] * $variablz);
        $calculos['calcfosf'] = $variablx *  $variably / 100;

        return $calculos;
    }
    public function getCformulaCAT($objetoxx)
    {
        $casasxxy = [

            ['name' => "npt_id", 'value' => $objetoxx->paciente->npt_id],
            ['name' => "tiempo", 'value' => $objetoxx->tiempo],
            ['name' => "velocidad", 'value' => $objetoxx->velocidad],
            ['name' => "volumen", 'value' => $objetoxx->volumen],
            ['name' => "purga", 'value' => $objetoxx->purga],
            ['name' => "peso", 'value' => $objetoxx->peso],
            ['name' => "total", 'value' => $objetoxx->total],
            ['name' => "sis_clinica_id", 'value' => $objetoxx->sis_clinica_id],


        ];
        return $casasxxy;
    }
    public function getCasasCAT()
    {
        $casasxxx = Casa::select(['id', 'nameidxx'])->get();
        $casasxxm = [];
        foreach ($casasxxx as $key => $value) {
            $casasxxm[$value->id] = ["{$value->nameidxx}", "{$value->nameidxx}_cant", "{$value->nameidxx}_volu"];
        }
        return  $casasxxm;
    }
    public function getDformulaCAT($dataxxxx)
    {
        foreach ($dataxxxx['objetoxx']->dformulas as $key => $value) {
            $casaxxxx = $dataxxxx['casasxxm'][$value->medicame->casa_id];
            $dataxxxx['casasxxx'][] = ['name' => "{$casaxxxx[0]}", 'value' => $value->medicame_id];
            $dataxxxx['casasxxx'][] = ['name' => "{$casaxxxx[1]}", 'value' => $value->cantidad];
            $dataxxxx['casasxxx'][] = ['name' => "{$casaxxxx[2]}", 'value' => $value->volumen];
        }
        return $dataxxxx['casasxxx'];
    }
    public function getArmarDataObjeto($objetoxx)
    {
        // $casasxxx = $this->getCformulaCAT($objetoxx);
        // $casasxxm =  $this->getCasasCAT();
        // $casasxxx = $this->getDformulaCAT(['objetoxx' => $objetoxx, 'casasxxm' => $casasxxm, 'casasxxx' => $casasxxx]);

        // $calculos = $this->getCalculos(['dataxxxx' => $casasxxx, 'campo_id' => 'aminoaci_volu']);
        foreach ($objetoxx->dformulas as $key => $value) {
            $nameidxx = $value->medicame->casa->nameidxx;
            $nameidxa = $nameidxx . '_cant';
            $nameidxb = $nameidxx . '_reto';
            $nameidxc = $nameidxx . '_volu';
            $nameidxd = $nameidxx . '_vopu';
            $objetoxx->$nameidxx = $value->medicame_id;
            $objetoxx->$nameidxa = $value->cantidad;
            $objetoxx->$nameidxb = $value->rtotal;
            $objetoxx->$nameidxc = $value->volumen;
            $objetoxx->$nameidxd = $value->purga;

            //    echo $value->medicame->casa->nameidxx.'<br>';
        }

        // ddd($objetoxx->toArray());
        //         $calculox = [];
        // foreach ($calculos as $key => $value) {
        //     $calculox[$value['campoxxx']] = $value['valuexxx'];
        // }
        return $objetoxx;
    }
    public function getCalculos($cabecera)
    {
        $datasxxx = $this->getArmarData($cabecera);

        if ($this->_datacat['nptidxxx'] == 3) { // adultos
            $this->_datacat = $this->calculosadultos($this->_datacat, $datasxxx);
        } else { // neonato y pediatrico
            $this->_datacat = $this->calculosneopediatrico($this->_datacat, $datasxxx);
        }

        $this->_datacat['carbvali'] = $this->_datacat['concarbo'] > 24.5 ? 'ADVER/R.H�?GADO GRASO' : ($this->_datacat['concarbo'] < 24.4 ? 'SEGURA' : '');
        $this->_datacat['concprov'] = $this->_datacat['concprot'] < 1 ? 'NO ESTABLE' : 'ESTABLE';
        $this->_datacat['conclipv'] = ($this->_datacat['conclipi'] < 1 && $this->_datacat['conclipi'] != 0) ? 'NO ESTABLE' : 'ESTABLE';
        $this->_datacat['osmolari'] = $datasxxx['osmolari'] / $this->_datacat['velopurg']; //OSMOLARIDAD (mOsm / L)
        $this->_datacat['osmolarv'] = $this->_datacat['osmolari'] > 700 ? 'VIA CENTRAL' : 'VIA PERIFÉRICA';
        $this->_datacat['calcfosv'] = $this->_datacat['calcfosf'] < 2 ? 'SEGURA' : 'NO SEGURA';
        $this->_datacat['calototv'] = $this->_datacat['calotota'] / $this->_datacat['calotota'] * 100;
        $this->_datacat['calocarv'] = $this->_datacat['calocarb'] / $this->_datacat['calotota'] * 100;
        $this->_datacat['calolipv'] = $this->_datacat['calolipi'] / $this->_datacat['calotota'] * 100;
        $this->_datacat['caloprov'] = $this->_datacat['caloprot'] / $this->_datacat['calotota'] * 100;

        $this->_datacat['pesoteor'] = $datasxxx['pesoespe']; //PESO TEORICO  (GRAMOS)

        $dataxxxx = [];
        foreach ($this->_datacat as $key => $value) {
            $dataxxxx[] = ['campoxxx' => $key, 'valuexxx' => is_numeric($value) ? number_format($value, 2, ",", ".") : $value];
        }
        // ddd( $dataxxxx);
        return $dataxxxx;
    }
}
