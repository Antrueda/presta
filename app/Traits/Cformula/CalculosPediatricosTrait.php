<?php

namespace App\Traits\Cformula;


trait CalculosPediatricosTrait
{
    private function calculosneopediatricoCPT($calculos, $datasxxx)
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
        if($calculos['gramtota']==0){
            $calculos['protnitr'] =0;
        }else{
            $calculos['protnitr'] = ($calculos['calolipi'] + $calculos['calocarb']) / $calculos['gramtota'];
        }

        //Relación: Cal No proteícas/g A.A
        if($aminoaci==0){
            $calculos['proteica'] = 0;
        }else {
            $calculos['proteica'] = ($calculos['calolipi'] + $calculos['calocarb']) / $aminoaci;
        }

        //Calorías totales/Kg./día
        $calculos['caltotkg'] = $calculos['calotota'] / $calculos['pesoxxxx'];
        //RELACIÓN CALCIO/FOSFÓRO                 (<2)
        $calculos['calcfosf'] = ($datasxxx[6]['requtota'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) * ($this->casaCT(2, $datasxxx)['volumenx'] * 31 / 1 / $calculos['volutota'] * 1000 / 31) / 100;

        return $calculos;
    }
}
