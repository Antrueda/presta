<?php

namespace App\Traits\Formulacion;

use App\Helpers\Cformula\CasasFormulacion;
use App\Models\Formulaciones\Hidrpedi;
use App\Models\Formulaciones\Lipopedi;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Mnpt;
use App\Traits\Formulacion\Auxiliares\Calculos\AdultoTrait;
use App\Traits\Formulacion\Auxiliares\Calculos\MenoresTrait;

trait FormulacionTrait
{
    use AdultoTrait;
    use MenoresTrait;
    public $_dataxxx = [];
    public $estructu = [];
    public $newdatax = [];
    public $formulac = ['osmolari' => 0, 'pesoespe' => 0];
    private function estructura($casasxxx)
    {
        $estructu['reqdiari'] = 0; // requerimiento diario del medicamento cuando se formula por volumen
        $estructu['reqtotal'] = 0; // requerimiento total del medicamnto
        $estructu['volumenx'] = 0; // volumen requerido por el medicamento cuando se formula por requeriminto diario
        $estructu['purgaxxx'] = 0; // calculo * purga
        $estructu['casasxxx'] = $casasxxx->nameidxx; // calculo * purga
        return $estructu;
    }
    public function getCasaEstructura()
    {
        $casasxxx = Casa::get();
        foreach ($casasxxx as $key => $casa) {
            $medicame = [];
            foreach ($casa->medicames as $key => $medicamx) {
                $medicame[$medicamx->id] = $this->estructura($casa);
            }
            $this->estructu[$casa->id] = $medicame;
        }
    }
    public  function getRango($request)
    {
        $medicame = Mnpt::where('medicame_id', $request->medicame)
            ->join('urangnpts', 'mnpts.urangnpt_id', '=', 'urangnpts.id')
            ->join('unidrangs', 'urangnpts.unidrang_id', '=', 'unidrangs.id')
            ->join('unidads', 'unidrangs.unidad_id', '=', 'unidads.id')
            ->where('urangnpts.npt_id', $request->npt_id)->first();
        return response()->json(['medicame' => $medicame->s_unidad, 'idmedica' => $request->idmedica . '_unid']);
    }


    public  function esnumerico()
    {
        $numeingr = $this->_dataxxx['requdiar'];
        if (!is_numeric($numeingr)) {
            if ($numeingr != '') {
                $numeingr = substr($numeingr, 0, strlen($numeingr) - 1);
            } else {
                $numeingr = 0;
            }
        }
        $this->_dataxxx['requdiar'] = $numeingr;
    }

    private  function convertirdata($dataxxxx)
    {
        $this->getCasaEstructura();
        $campo_id = explode('_', $dataxxxx['campo_id']);
        $aguaxxxx = 0;
        $volumenx = 0;
        foreach ($dataxxxx['dataxxxx'] as $key => $value) {
            if ($key > 1) {
                $value['value'] = str_replace(',', '', $value['value']);
                $this->newdatax[$value['name']] = (float)$value['value'];
                /**
                 * calcular el agua
                 */
                $campoxxx = explode('_', $value['name']);
                if (count($campoxxx) > 1 && $campoxxx[1] == 'volu' && $campoxxx[0] != 'aguaeste') {
                    $aguaxxxx += (float)$value['value'];
                }

                /**
                 * conocer el volumen
                 */
                if ($value['name'] == 'volumen') {
                    $volumenx = $value['value'];
                }
            }
        }

        $this->_dataxxx['aguaxxxx'] = $volumenx - $aguaxxxx;
        $this->_dataxxx['campoxxx'] = $campo_id[0]; // nombre del campo que se selecciono
        $this->_dataxxx['cantvolu'] = $campo_id[1]; // saber si el requerimiento diario es por cantidad o por volumen
        $this->_dataxxx['medisele'] = $this->newdatax[$campo_id[0]]; // mediamento seleccionado
        $this->_dataxxx['requdiar'] = $this->newdatax[$dataxxxx['campo_id']]; // requerimineto diario por el mendicamento seleccionado
        $this->_dataxxx['fosfa_id'] = $this->newdatax['fosfatox']; // fosfato seleccionado
        $this->_dataxxx['fosfcant'] = $this->newdatax['fosfatox_cant']; // requerimiento diario del fosfato del fosfato seleccionado
        $this->_dataxxx['campo_id'] = $dataxxxx['campo_id']; // campo en que se esta digitando
        $this->_dataxxx['rediafos'] = $this->newdatax["fosfatox_" . $campo_id[1]]; // requerimiento diario o volumen del fosfato seleccionado
        $this->_dataxxx['multivi2'] = $this->newdatax["vitalipo_cant"]; // multivitamina liposoluble seleccionada requerimiento diario
        $this->_dataxxx['lipovolu'] = $this->newdatax["vitalipo_volu"]; // multivitamina liposoluble seleccionada volumen
        $this->_dataxxx['pesoxxxx'] = $this->newdatax["peso"]; // multivitamina liposoluble seleccionada
        $this->_dataxxx['nptidxxx'] = $this->newdatax["npt_id"]; // multivitamina liposoluble seleccionada
        $this->_dataxxx['tiempoxx'] = $this->newdatax["tiempo"]; // multivitamina liposoluble seleccionada
        $this->_dataxxx['velocida'] = $this->newdatax["velocidad"]; // multivitamina liposoluble seleccionada
        $this->_dataxxx['volumenx'] = $this->newdatax[$dataxxxx['campo_id']];
        $this->_dataxxx['volutota'] = $this->_dataxxx['tiempoxx'] * $this->_dataxxx['velocida'];
        $this->_dataxxx['volupurg'] = $this->_dataxxx['volutota'] + $this->newdatax["purga"];
        $this->_dataxxx['medicame'] = Medicame::where('id', $this->_dataxxx['medisele'])->first();

        // hallar la osmolaridad y el peso específico
        foreach ($this->newdatax as $key => $value) {
            $campoidx = explode('_', $key);
            if (count($campoidx) > 1 && $campoidx[1] == 'cant') {
                $medisele = $this->newdatax[$campoidx[0]] = (int)$this->newdatax[$campoidx[0]];
                if ($campoidx[0] != 'aguaeste') {
                    $medicame = Medicame::find($medisele);
                    $osmolari = $medicame->mmarcas->first()->osmorali * $this->newdatax[$campoidx[0] . '_vopu'];
                    $this->formulac['osmolari'] += $osmolari; // calcular la osmolarida
                    $pesoespe = $medicame->mmarcas->first()->pesoespe * $this->newdatax[$campoidx[0] . '_vopu'];
                    $this->formulac['pesoespe'] += $pesoespe; // calcular el peso específico
                    if ($this->newdatax[$key] > 0) {
                        $respuest = [
                            [
                                'fosfcant' => $this->_dataxxx['fosfcant'],
                                'fosfatid' => $this->_dataxxx['fosfa_id'],
                                'requdiar' => $this->newdatax[$campoidx[0] . '_cant'],
                                'volutota' => $this->_dataxxx['volutota'],
                                'volupurg' => $this->_dataxxx['volupurg'],
                                'pesoxxxx' => $this->_dataxxx['pesoxxxx'],
                                'nptidxxx' => $this->newdatax['npt_id'],
                                'medicame' => $medicame->id,
                                'estructu' => $this->estructu[$medicame->casa->id][$medicame->id],
                                'volumenx' => $this->newdatax[$campoidx[0] . '_volu'],
                            ],
                        ];
                        $nameidxx = ucwords($medicame->casa->nameidxx);
                        $this->formulac[$medicame->casa->nameidxx] = $this->getFuncionVolumen($respuest, $nameidxx)[0]['estructu'];
                    }
                    if ($key = 'npt_id') {
                        $this->newdatax[$key] = (int)$this->newdatax[$key];
                    }
                }
            }
        }
    }
    /**
     * consultar el rango del dato digitado
     *
     * @param array $this->_dataxxx
     * @return $respuest
     */
    public function getRangoDigitado()
    {
        $respuest = Mnpt::join('urangnpts', 'mnpts.urangnpt_id', '=', 'urangnpts.id')
            ->join('unidrangs', 'urangnpts.unidrang_id', '=', 'unidrangs.id')
            ->join('unidads', 'unidrangs.unidad_id', '=', 'unidads.id')
            ->join('rangonpts', 'unidrangs.rangonpt_id', '=', 'rangonpts.id')
            ->where('medicame_id', $this->_dataxxx['medicame']->id)
            ->where('rangonpts.sis_esta_id', 1)
            ->where('urangnpts.npt_id', $this->_dataxxx['nptidxxx'])
            ->first();
        return  $respuest;
    }

    /**
     * armar mensaje que se muestra cuando el profesional se pasa del rango normal
     *
     * @param array $this->_dataxxx
     * @param double $valocant
     * @return void
     */
    public function getArmarMensaje($valocant, $medicame)
    {

        $messagex = '';
        $mostmess = false;
        //echo $valocant .' < '. $medicame->randesde.' &&  '. $valocant .'> 0';
        // lanzar mensaje cuando la cantidad ingresada es menor al rango establecido
        if ($valocant < $medicame->randesde && $valocant > 0) {
            $messagex = "El valor que está formulado es inferior al rango: {$medicame->randesde}-{$medicame->ranhasta} {$medicame->s_unidad}";
            $mostmess = true;
        }
        // lanzar mensaje cuando la cantidad ingresada es mayor al rango establecido
        if ($valocant > $medicame->ranhasta) {
            $messagex = "El valor que está formulado es superior al rango: {$medicame->randesde}-{$medicame->ranhasta} {$medicame->s_unidad}";
            $mostmess = true;
        }
        $respuest = ['mostmess' => $mostmess, 'messagex' => $messagex];
        return $respuest;
    }


    /**
     * indicar si muestar o no el mensaje
     * mensaje resultado de digitar volumen o requerimiento
     *
     * @param array $this->_dataxxx
     * @return $respuest
     */
    public function getMostrarOcultarMensaje($valocant, $medicame)
    {
        $messagex = $this->getArmarMensaje($valocant, $medicame);
        $respuest = [];
        $mostmess = 'hide';
        if ($messagex['mostmess']) {
            $mostmess = 'show';
        }
        $respuest['messagex'] = [$this->_dataxxx['campoxxx'] . '_cant', $mostmess, $messagex['messagex'], '¡CUIDADO!'];
        return $respuest;
    }

    /**
     * armar la estructura de la respuesta
     *
     * @param string $campoxxx
     * @param double $cantvolu
     * @param array $this->_dataxxx
     * @param double $aguaxxxx
     * @return $respuest
     */
    public function getRespuestaGeneral($campoxxx, $cantvolu, $medicame)
    {
        $respuest = [];
        $respuest['cantvolu'] =  [
            $this->_dataxxx['campoxxx'] . $campoxxx,
            number_format($cantvolu, 2, '.', '')
        ];
        $respuest['unidadxx'] = [
            $this->_dataxxx['campoxxx'] . '_cant',
            $medicame->rangunid
        ];
        $respuest['aguaxxxx'] = number_format($this->_dataxxx['aguaxxxx'], 2);
        return $respuest;
    }

    public function getDataxxxx()
    {
        $respuest = [
            [
                'fosfcant' => $this->_dataxxx['fosfcant'],
                'fosfatid' => $this->_dataxxx['fosfa_id'],
                'requdiar' => $this->_dataxxx['requdiar'],
                'volutota' => $this->_dataxxx['volutota'],
                'volupurg' => $this->_dataxxx['volupurg'],
                'pesoxxxx' => $this->_dataxxx['pesoxxxx'],
                'nptidxxx' => $this->_dataxxx['nptidxxx'],
                'medicame' => $this->_dataxxx['medicame']->id,
                'estructu' => $this->estructu[$this->_dataxxx['medicame']->casa->id][$this->_dataxxx['medicame']->id],
                'volumenx' => $this->_dataxxx['volumenx'],
            ],
        ];
        return $respuest;
    }

    public function getFuncionVolumen($dataxxxx, $nameidxx)
    {
        $dataxxxx[0]['cantidad'] = $dataxxxx[0]['requdiar'];
        $dataxxxx[0]['reqtotal'] = $dataxxxx[0]['estructu']['reqtotal'] = $this->getFormula(
            'Reqtotal',
            $dataxxxx,
            $nameidxx
        )[$dataxxxx[0]['medicame']];
        $dataxxxx[0]['volumenx'] = $dataxxxx[0]['estructu']['volumenx'] = $this->getFormula('Volumen', $dataxxxx, $nameidxx)[$dataxxxx[0]['medicame']];
        $dataxxxx[0]['estructu']['purgaxxx'] = $this->getFormula('Purga', $dataxxxx, $nameidxx)[$dataxxxx[0]['medicame']];
        return $dataxxxx;
    }

    /**
     * realizar cáculos cuando se digita requerimienot diario
     *
     * @param object $medicame
     * @return $respuest
     */
    public function getCalculoVolumen($medicame)
    {
        $nameidxx = ucwords($this->_dataxxx['medicame']->casa->nameidxx);
        $dataxxxx = $this->getDataxxxx();
        $dataxxxx = $this->getFuncionVolumen($dataxxxx, $nameidxx);

        // $estructu = $dataxxxx[0]['estructu'];
        // $dataxxxx[0]['cantidad'] = $dataxxxx[0]['requdiar'];
        // $dataxxxx[0]['reqtotal'] = $dataxxxx[0]['estructu']['reqtotal'] = $this->getFormula('Reqtotal', $dataxxxx)[$dataxxxx[0]['medicame']];
        // $dataxxxx[0]['volumenx'] = $dataxxxx[0]['estructu']['volumenx'] = $this->getFormula('Volumen', $dataxxxx)[$dataxxxx[0]['medicame']];
        // $dataxxxx[0]['estructu']['purgaxxx'] = $this->getFormula('Purga', $dataxxxx)[$dataxxxx[0]['medicame']];
        $respuest = $this->getRespuestaGeneral('_volu',  $dataxxxx[0]['estructu']['volumenx'], $medicame);
        $respuest['cantvolu'][2] = $this->_dataxxx['campoxxx'] . '_reto';
        $respuest['cantvolu'][3] = $dataxxxx[0]['estructu']['reqtotal'];
        $respuest['cantvolu'][4] = $this->_dataxxx['campoxxx'] . '_vopu';
        $respuest['cantvolu'][5] = number_format($dataxxxx[0]['estructu']['purgaxxx'], 2);
        $respuest['menssage'] = $this->getMostrarOcultarMensaje($this->_dataxxx['requdiar'], $medicame);
        return $respuest;
    }

    public function getFormula($funcionx, $dataxxxx, $nameidxx)
    {
        $traitxxx = $nameidxx . "Trait";
        $formulax = call_user_func_array(
            [
                __NAMESPACE__ . "\Auxiliares\Medicamentos\\" . $traitxxx,
                "get{$nameidxx}{$funcionx}"
            ],
            $dataxxxx
        );
        return $formulax;
    }
    /**
     * realizar cálculos cuando se digita volumen
     *
     * @param array $this->_dataxxx
     * @return $respuest
     */
    public function getCalculoRequDiario($medicame)
    {
        $nameidxx = ucwords($this->_dataxxx['medicame']->casa->nameidxx);
        $dataxxxx = $this->getDataxxxx();
        $estructu = $dataxxxx[0]['estructu'];
        $dataxxxx[0]['cantidad'] = $dataxxxx[0]['volumenx'];
        $dataxxxx[0]['cantidad'] = $estructu['reqdiari'] =
            $this->getFormula('Reqdiario', $dataxxxx, $nameidxx)[$dataxxxx[0]['medicame']];
        $estructu['reqtotal'] =
            $this->getFormula('Reqtotal', $dataxxxx, $nameidxx)[$dataxxxx[0]['medicame']];
        $estructu['purgaxxx']  =
            $this->getFormula('Purga', $dataxxxx, $nameidxx)[$dataxxxx[0]['medicame']];
        $respuest = $this->getRespuestaGeneral('_cant',   $estructu['reqdiari'], $medicame);
        $respuest['cantvolu'][2] = $this->_dataxxx['campoxxx'] . '_reto';
        $respuest['cantvolu'][3] = $estructu['reqtotal'];
        $respuest['cantvolu'][4] = $this->_dataxxx['campoxxx'] . '_vopu';
        $respuest['cantvolu'][5] = number_format($estructu['purgaxxx'], 2);
        $respuest['menssage'] = $this->getMostrarOcultarMensaje($estructu['reqdiari'], $medicame);
        return $respuest;
    }

    /**
     * respuesta del cálculo dependiendo de lo que se esté digitando (volumen o requerimiento diario)
     *
     * @param array $this->_dataxxx
     * @return $respuest
     */
    public function getDatosRespuesta()
    {
        $medicame = $this->getRangoDigitado();
        $this->esnumerico($this->_dataxxx);
        if ($this->_dataxxx['cantvolu'] == 'cant') { // se digita requerimiento diario
            $respuest = $this->getCalculoVolumen($medicame); // respuesta en volumen
        } else { // se digita volumen
            $respuest = $this->getCalculoRequDiario($medicame); // respuesta en requerimiento diario
        }
        return $respuest;
    }

    /**
     * calcular volumen o requerimiento diario dependiendo de lo que se esté digitando
     *
     * @param array $this->_dataxxx
     * @return $respuest
     */
    public  function getCalculosFomula($dataxxxx)
    {
        $this->convertirdata($dataxxxx);
        // $respuest = $this->getDatosRespuesta();
        // $this->getCalculosFT();
        $respuest = [$this->getDatosRespuesta(),
        $this->getCalculosFT()
    ];
        return $respuest;
    }
    public function getCalculosFT()
    {
        // $datasxxx = $this->getArmarData($cabecera);
        if ((int)$this->_dataxxx['nptidxxx'] == 3) { // adultos
            $this->getAdultosAT([]);
        } else { // neonato y pediatrico
            $this->getMenoresMT([]);
        }
        $this->_dataxxx['carbvali'] = $this->_dataxxx['concarbo'] > 24.5 ? 'ADVER/R.H�?GADO GRASO' : ($this->_dataxxx['concarbo'] < 24.4 ? 'SEGURA' : '');
        $this->_dataxxx['concprov'] = $this->_dataxxx['concprot'] < 1 ? 'NO ESTABLE' : 'ESTABLE';
        $this->_dataxxx['conclipv'] = ($this->_dataxxx['conclipi'] < 1 && $this->_dataxxx['conclipi'] != 0) ? 'NO ESTABLE' : 'ESTABLE';
        $this->_dataxxx['osmolari'] = $this->formulac['osmolari'] / $this->_dataxxx['volupurg']; //OSMOLARIDAD (mOsm / L)
        $this->_dataxxx['osmolarv'] = $this->_dataxxx['osmolari'] > 700 ? 'VIA CENTRAL' : 'VIA PERIFÉRICA';
        $this->_dataxxx['calcfosv'] = $this->_dataxxx['calcfosf'] < 2 ? 'SEGURA' : 'NO SEGURA';

        $this->_dataxxx['calototv'] = 0;
        $this->_dataxxx['calocarv'] = 0;
        $this->_dataxxx['calolipv'] = 0;
        $this->_dataxxx['caloprov'] = 0;
        if ($this->_dataxxx['calotota'] > 0) {
            $this->_dataxxx['calototv'] = $this->_dataxxx['calotota'] / $this->_dataxxx['calotota'] * 100;
            $this->_dataxxx['calocarv'] = $this->_dataxxx['calocarb'] / $this->_dataxxx['calotota'] * 100;
            $this->_dataxxx['calolipv'] = $this->_dataxxx['calolipi'] / $this->_dataxxx['calotota'] * 100;
            $this->_dataxxx['caloprov'] = $this->_dataxxx['caloprot'] / $this->_dataxxx['calotota'] * 100;
        }


        $this->_dataxxx['pesoteor'] = $this->formulac['pesoespe']; //PESO TEORICO  (GRAMOS)

        $dataxxxx = [];
        foreach ($this->_dataxxx as $key => $value) {
            $dataxxxx[] = ['campoxxx' => $key, 'valuexxx' => is_numeric($value) ? number_format($value, 2, ",", ".") : $value];
        }
        return $dataxxxx;
    }

    /**
     * calcular el requerimiento diario para elementos traza, vitamina hidrosolube y vitamina liposoluble cuando el npt es
     * pediatrio o neonato
     */
    private  function getPedineon()
    {
        $requerim = 0;
        /**
         * Calcular requerimiento diario de acurdo al medicamento
         */
        switch ($this->_dataxxx['campoxxx']) {
            case 'elemtraz':
                $requerim = $this->_dataxxx["peso"] < 2.5 ? 400 : 250;
                break;
            case 'multivit': //hidrosoluble
                $requerim = Hidrpedi::where(function ($queryxxx) {
                    $pesoxxxx = $this->_dataxxx["peso"];
                    $finalxxx = $pesoxxxx;
                    if ($pesoxxxx < 0.5) {
                        $queryxxx->where('finalxxx', '<=', 0.5);
                    } elseif ($pesoxxxx > 2.4) {
                        $queryxxx->where('finalxxx', '>', 2.4);
                    } else {
                        $decimale = explode('.', $pesoxxxx);
                        $inicioxx = $pesoxxxx;
                        $finalxxx = $pesoxxxx;
                        if (count($decimale) > 1) {
                            $largoxxx = strlen($decimale[1]);
                            $inicioxx = $pesoxxxx - 0.1;
                            $finalxxx = $inicioxx;
                            if ($largoxxx > 1) {
                                $inicioxx = $decimale[0] . '.' . substr($decimale[1], 0, 1);
                                $finalxxx = $pesoxxxx;
                            }
                        }
                        $queryxxx->whereBetween('inicioxx', [$inicioxx, $finalxxx]);
                    }
                    return $queryxxx;
                })
                    ->first()->requerim;
                break;
            case 'vitalipo': //liposoluble
                $requerim = Lipopedi::where(function ($queryxxx) {
                    $pesoxxxx = $this->_dataxxx["peso"];
                    $finalxxx = $pesoxxxx;
                    if ($pesoxxxx < 0.5) {
                        $queryxxx->where('finalxxx', '<=', 0.5);
                    } elseif ($pesoxxxx > 2.4) {
                        $queryxxx->where('finalxxx', '>', 2.4);
                    } else {
                        $decimale = explode('.', $pesoxxxx);
                        $inicioxx = $pesoxxxx;
                        $finalxxx = $pesoxxxx;
                        if (count($decimale) > 1) {
                            $largoxxx = strlen($decimale[1]);
                            $inicioxx = $pesoxxxx - 0.1;
                            $finalxxx = $inicioxx;
                            if ($largoxxx > 1) {
                                $inicioxx = $decimale[0] . '.' . substr($decimale[1], 0, 1);
                                $finalxxx = $pesoxxxx;
                            }
                        }
                        $queryxxx->whereBetween('inicioxx', [$inicioxx, $finalxxx]);
                    }
                    return $queryxxx;
                })

                    ->first()->requerim;
                break;
        }
        return $requerim;
    }
    /**
     *  hallar la fomulacion para elementos traza, vitamian hidrosoluble y vitamina liposoluble de pediatrio y neonato
     */
    public  function getFormulaciones($medicame)
    {
        $this->_dataxxx = $this->convertirdata($this->_dataxxx);
        $construc = [
            'peso' => $this->_dataxxx['peso'],
            'npt_id' => $this->_dataxxx['npt_id'],
            'purga' => $this->_dataxxx['purga'],
            'tiempo' => $this->_dataxxx['tiempo'],
            'velocidad' => $this->_dataxxx['velocidad']
        ];
        $casaform = new CasasFormulacion($construc);
        if ($this->_dataxxx['npt_id'] != 3) {
            $this->_dataxxx['requdiar'] = $this->getPedineon($this->_dataxxx);
        }
        $formulax = $casaform->calculos($this->_dataxxx)[$this->_dataxxx['medisele']];
        /**
         * cantidad en volumen y en requirimiento diaro
         */
        return [
            'campcant' => $this->_dataxxx['campoxxx'] . '_cant',
            'cantidad' => number_format($this->_dataxxx['requdiar'], 2),
            'campvolu' => $this->_dataxxx['campoxxx'] . '_volu',
            'volumenx' => number_format($formulax['volumenx'], 2)
        ];
    }
}
