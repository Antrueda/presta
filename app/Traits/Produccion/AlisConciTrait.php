<?php

namespace App\Traits\Produccion;

use App\Models\Dispositivos\Dlote;
use App\Models\Medicamentos\Mlote;
use App\Models\Produccion\Calistam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * realizar toda la lógica para pitar los formularios de alistamiento y conciliación
 */
trait AlisConciTrait
{
    public function getArrayDataACT()
    {
        return [
            'nombrexx' => '',
            'fechvenc' => '',
            'inventar' => 0,
            'lotexxxx' => '',
            'reginvim' => '',
            'idxxxxxx' => '',
            'unidadxx' => '',
            'cantcons' => 0,
            'diferenc' => 0,
            'mostrarx' => false
        ];
    }

    public function getIgualarDataACT($lotesxxx, $lotesyyy)
    {
        $igualarx = true;
        $tamaniox = $lotesxxx['tamaniox'] - $lotesyyy['tamaniox'];
        if ($lotesyyy['tamaniox'] > $lotesxxx['tamaniox']) {
            $tamaniox = $lotesyyy['tamaniox'] - $lotesxxx['tamaniox'];
            $igualarx = false;
        }
        for ($i = 0; $i < $tamaniox; $i++) {
            if ($igualarx) {
                $lotesyyy['lotesxxx'][] = $this->getArrayDataACT();
            } else {
                $lotesxxx['lotesxxx'][] = $this->getArrayDataACT();
            }
        }
        return ['lotesxxx' => $lotesxxx['lotesxxx'], 'lotesyyy' => $lotesyyy['lotesxxx']];
    }



    public function getDataDBACT($dataxxxy, $opcionxx)
    {
        if (isset($opcionxx['padrexxx']->id)) {
            if ($opcionxx['distingu'] == 'xxxx') {
                $lotexxxx = $opcionxx['padrexxx']->mlotes()->where('calistamgable_id', $opcionxx['lotexxxx'])->first();
                if (isset($lotexxxx->id)) {
                    $dataxxxy['unidadxx'] = $lotexxxx->pivot->unidad;
                    $dataxxxy['cantcons'] = $lotexxxx->pivot->cantcons;
                    $dataxxxy['diferenc'] = $lotexxxx->pivot->diferenc;
                }
            } else {
                $lotexxxx = $opcionxx['padrexxx']->dlotes()->where('calistamgable_id', $opcionxx['lotexxxx'])->first();
                if (isset($lotexxxx->id)) {
                    $dataxxxy['unidadxx'] = $lotexxxx->pivot->unidad;
                    $dataxxxy['cantcons'] = $lotexxxx->pivot->cantcons;
                    $dataxxxy['diferenc'] = $lotexxxx->pivot->diferenc;
                }
            }
        }
        return $dataxxxy;
    }
    public function getAramarDataACT($dataxxxx, $distingu, $opcionxx)
    {
        $lotesxxx = [];
        foreach ($dataxxxx as $key => $value) {
            $dataxxxy = $this->getArrayDataACT();
            $dataxxxy['nombrexx'] =   $value->nombrexx;
            $dataxxxy['idxxxxxx'] =   'idun_' . $distingu . '_' . $value->id;
            $dataxxxy['fechvenc'] =   $value->fechvenc;
            $dataxxxy['inventar'] =   $value->inventar;
            $dataxxxy['lotexxxx'] =   $value->lotexxxx;
            $dataxxxy['reginvim'] =   $value->reginvim;
            $dataxxxy['mostrarx'] =   true;
            $opcionxx['distingu'] = $distingu;
            $opcionxx['lotexxxx'] = $value->id;
            if ($opcionxx['alisconc']) {
                $lotesxxy = $this->getDataDBACT($dataxxxy, $opcionxx);
                if ($lotesxxy['unidadxx'] > 0) {
                    $lotesxxx[] = $lotesxxy;
                }
            } else {
                $lotesxxx[] = $this->getDataDBACT($dataxxxy, $opcionxx);
            }
        }
        return ['lotesxxx' => $lotesxxx, 'tamaniox' => count($lotesxxx)];
    }
    /**
     * obtener los lotes de medicamentos que se van a mostrar en el formulario
     *
     * @return void
     */
    public function getMlotesACT($opcionxx)
    {
        $lotesxxx = Mlote::select([
            'mlotes.id', 'mlotes.fechvenc', 'mlotes.inventar', 'mlotes.lotexxxx', 'minvimas.reginvim', 'medicames.nombgene as nombrexx'
        ])
            ->join('minvimas', 'mlotes.minvima_id', '=', 'minvimas.id')
            ->join('mmarcas', 'minvimas.mmarca_id', '=', 'mmarcas.id')
            ->join('medicames', 'mmarcas.medicame_id', '=', 'medicames.id')
            ->where('fechvenc', '>', date('Y-m-d', time()))
            ->where('inventar', '>', 0)
            ->where('mlotes.sis_esta_id',  1)
            ->orderBy('medicames.nombgene', 'ASC')
            ->get();
        return $this->getAramarDataACT($lotesxxx, 'xxxx', $opcionxx);
    }
    /**
     * obtener los lotes de dispositivos médicos que se van a mostrar en el formulario
     *
     * @return void
     */
    public function getDlotesACT($opcionxx)
    {
        $lotesxxx = Dlote::select([
            'dlotes.id', 'dlotes.fechvenc', 'dlotes.inventar', 'dlotes.lotexxxx', 'dmarcas.reginvim', 'dmedicos.nombrexx'
        ])
            ->join('dmarcas', 'dlotes.dmarca_id', '=', 'dmarcas.id')
            ->join('dmedicos', 'dmarcas.dmedico_id', '=', 'dmedicos.id')
            ->where('fechvenc', '>', date('Y-m-d', time()))
            ->where('inventar', '>', 0)
            ->where('dlotes.sis_esta_id',  1)
            ->orderBy('dmedicos.nombrexx', 'ASC')
            ->get();
        return $this->getAramarDataACT($lotesxxx, 'yyyy', $opcionxx);
    }


    public function getMlotesDlotesACT($opcionxx)
    {
        $lotesxxx = $this->getMlotesACT($opcionxx);
        $lotesyyy = $this->getDlotesACT($opcionxx);
        $dataxxxx = $this->getIgualarDataACT($lotesxxx, $lotesyyy);
        // ddd($dataxxxx);
        return  $dataxxxx;
    }
    public function setCasosACT($value, $objetoxx, $lotexxxx, $dataxxxx)
    {
        $compleme = [
            'sis_esta_id' => 1,
            'user_crea_id' => Auth::user()->id,
            'user_edita_id' => Auth::user()->id
        ];

        if ($dataxxxx->alisconc) { // la data vien de conciliacion
            $lotexist = $objetoxx->where('calistamgable_id', $lotexxxx)->first()->pivot->unidad;
            $compleme['cantcons'] = $lotexist-$value ;
            $compleme['diferenc'] = $value;
            $objetoxx->updateExistingPivot($lotexxxx, $compleme, false);
        } else { // la data viene de alistamiento
            if ($value > 0) {
                $compleme['unidad'] = $value;
                if ($objetoxx != '') {
                    $lotexist = $objetoxx->where('calistamgable_id', $lotexxxx)->first();
                    if ($lotexist != null) {
                        $objetoxx->updateExistingPivot($lotexxxx, $compleme, false);
                    } else {
                        $objetoxx->attach([$lotexxxx => $compleme]);
                    }
                } else {
                    $objetoxx->attach([$lotexxxx => $compleme]);
                }
            }
        }
    }

    public function setCrearActualizarloteACT($key, $value, $objetoxx, $marcaxxx, $dataxxxx)
    {
        $lotexxxx = str_replace(["idun_{$marcaxxx}_", '_dif'], '', $key);
        switch ($marcaxxx) {
            case 'xxxx':
                $this->setCasosACT(
                    $value,
                    $objetoxx->mlotes() !== null ? $objetoxx->mlotes() : '',
                    $lotexxxx,
                    $dataxxxx
                );
                break;
            case 'yyyy':
                $this->setCasosACT(
                    $value,
                    $objetoxx->dlotes() !== null ? $objetoxx->dlotes() : '',
                    $lotexxxx,
                    $dataxxxx
                );
                break;
        }
    }
    public function setTransaccionACT($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx->request->add(['user_edita_id' => Auth::user()->id]);
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx->all());
            } else {
                $dataxxxx->request->add(['user_crea_id' => Auth::user()->id]);
                $objetoxx = Calistam::create($dataxxxx->all());
            }
            foreach ($dataxxxx->request as $key => $value) {
                $textxxxx = strpos($key, 'xxxx');
                if ($textxxxx) {
                    $this->setCrearActualizarloteACT($key, $value, $objetoxx, 'xxxx', $dataxxxx);
                }
                $textxxxx = strpos($key, 'yyyy');
                if ($textxxxx) {
                    $this->setCrearActualizarloteACT($key, $value, $objetoxx, 'yyyy', $dataxxxx);
                }
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
