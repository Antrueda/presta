<?php

namespace App\Helpers\Produccion;

use App\Models\Dispositivos\Dlote;
use App\Models\Medicamentos\Mlote;
use App\Models\Produccion\Dalistam;

class Conciliacion
{


    public static function getMedicame($dataxxxx, $mayorxxx, $registr, $cabecera)
    {
        $idxxxxxx = ($cabecera == 0) ? $cabecera : (isset($registr->id)?$registr->id:0);
        $valorxxx = Dalistam::select('unidad')->where('calistam_id', $cabecera)
            ->where('campo_id', 'medic_' . $idxxxxxx)->first();
        $dataxxxx['medicamm'] = ($mayorxxx == true) ? $registr->minvima->mmarca->medicame->nombgene : ($registr == '' ? '' : $registr->minvima->mmarca->medicame->nombgene);
        $dataxxxx['value_me'] = isset($valorxxx->unidad)?$valorxxx->unidad:0;
        $dataxxxx['lotexxxm'] = ($mayorxxx == true) ? $registr->lotexxxx : ($registr == '' ? '' : $registr->lotexxxx);
        $dataxxxx['reginvim'] = ($mayorxxx == true) ? $registr->minvima->reginvim : ($registr == '' ? '' : $registr->minvima->reginvim);
        $dataxxxx['fechvenm'] = ($mayorxxx == true) ? $registr->fechvenc : ($registr == '' ? '' : $registr->fechvenc);
        $dataxxxx['medic_id'] = ($mayorxxx == true) ? 'medic_' . $registr->id : ($registr == '' ? '' : 'medic_' . $registr->id);
        return $dataxxxx;
    }
    public static function getDisposit($dataxxxx, $mayorxxx, $registr, $cabecera)
    {
        $idxxxxxx = ($cabecera == 0) ? $cabecera : (isset($registr->id)?$registr->id:0);
        $valorxxx = Dalistam::select('unidad')->where('calistam_id', $cabecera)
            ->where('campo_id', 'dispo_' . $idxxxxxx)->first();
        $dataxxxx['medicamd'] =
            ($mayorxxx == true) ? $registr->dmarca->dmedico->nombrexx : ($registr == '' ? '' : $registr->dmarca->dmedico->nombrexx);

        $dataxxxx['value_di'] = isset($valorxxx->unidad)?$valorxxx->unidad:0;
        $dataxxxx['lotexxxd'] = ($mayorxxx == true) ? $registr->lotexxxx : ($registr == '' ? '' : $registr->lotexxxx);
        $dataxxxx['reginvid'] = ($mayorxxx == true) ? $registr->dmarca->reginvim : ($registr == '' ? '' : $registr->dmarca->reginvim);
        $dataxxxx['fechvend'] = ($mayorxxx == true) ? $registr->fechvenc : ($registr == '' ? '' : $registr->fechvenc);
        $dataxxxx['dispo_id'] = ($mayorxxx == true) ? 'dispo_' . $registr->id : ($registr == '' ? '' : 'dispo_' . $registr->id);

        return $dataxxxx;
    }
    public static function getMlotes()
    {
        $mlotexxx = Mlote::where('fechvenc', '>', date('Y-m-d', time()))
            ->where('inventar', '>', 0)
            ->get();
        return $mlotexxx;
    }
    public static function getDlotes()
    {
        $dispmedi = Dlote::where('fechvenc', '>', date('Y-m-d', time()))
            ->where('inventar', '>', 0)
            ->get();
        return $dispmedi;
    }
    public static function getMlotesDlotes($opcionxx)
    {
        $medicame = Conciliacion::getMlotes();
        $dispmedi = Conciliacion::getDlotes();
        $mayorxxx = true;
        $dataxxxx = $medicame;
        $medicant = count($medicame);
        $dispcant = count($dispmedi);
        /**
         * si la cantida de registros de dlotes es mayor a mlotes
         * entonces dlotes pasa a ser la data principal
         */
        if ($dispcant > $medicant) {
            $dataxxxx = $dispmedi;
            $mayorxxx = false;
        }
        $dispensa = [];
        foreach ($dataxxxx as $key => $registr) {
            $dataxxxy = [];
            if ($mayorxxx) {

                $dataxxxy = Conciliacion::getMedicame($dataxxxy, $mayorxxx, $registr, $opcionxx);
                $dispensa[] = Conciliacion::getDisposit($dataxxxy, false, ($key < $medicant) ? $dispmedi[$key] : '', $opcionxx);
            } else {
                $dataxxxy = Conciliacion::getDisposit($dataxxxy, true, $registr, $opcionxx);
                $dispensa[] = Conciliacion::getMedicame($dataxxxy, $mayorxxx, ($key < $medicant) ? $medicame[$key] : '', $opcionxx);
            }
        }
        return $dispensa;
    }
}
