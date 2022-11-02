<?php

namespace App\Traits\Cformula;

trait CalculosFormulacion
{
    private $_dataxxx;
    public function __construct()
    {
        $this->_dataxxx = [
            'volutota' => 0, //volumen total
            'veloinfu' => 0,  //velocidad de infusion
            'pesoxxxx' => 0, //velocidad de infusion
            'velopurg' => 0,  //velocidad de infusion
            'carbvali' => 0,
            'concprov' => 0,
            'conclipv' => 0,
            'osmolari' => 0,  //OSMOLARIDAD (mOsm / L) 
            'osmolarv' => 0,
            'calcfosv' => 0,
            'calototv' => 0,
            'calocarv' => 0,
            'calolipv' => 0,
            'caloprov' => 0,
            'pesoteor' => 0,  //PESO TEORICO  (GRAMOS)
            'concarbo' => 0,
            'concprot' => 0,
            'conclipi' => 0,
            'gramtota' => 0,
            'protnitr' => 0,
            'proteica' => 0,
            'caloprot' => 0,
            'calolipi' => 0,
            'calocarb' => 0,
            'calotota' => 0,
            'caltotkg' => 0,
            'calcfosf' => 0
        ];
    }

    public function getPesoTeorico(){
    
    }
}
