<?php

namespace App\Traits\Reportes\Excelxxx\Infoclin;

trait MedicamentosCobrarTrait
{
    public function getMedicamentosACobrarMCT($dataxxxx)
    {
        $cobrarxx = [];
        $contarxx=0;
        $cformula = $dataxxxx['cformula'];
        $volumenx=$cformula->total;
        $medicame = $cformula->sis_clinica->medicames;
        foreach ($medicame as $key => $medicamx) {
            if ($medicamx->pivot->cobrsepa == 1) {
                $cobrarxx[] = $medicamx->id;
            }
        }
        $dformula=[];
        foreach ($cformula->dformulas as $key => $value) {
            if (in_array($value->medicame_id, $cobrarxx)) {
                 $volumenx-=$value->volumen;
                $contarxx++;
                $dformula[]=$value;
            }
        }
        return [$dformula, $contarxx == 0 ? 1 : $contarxx,$volumenx];
    }
    public function getCobrarMCT($dataxxxx)
    {
        return $this->getMedicamentosACobrarMCT($dataxxxx);
    }
}
