<?php

namespace App\Traits\Alertas;

use App\Models\Alerta;
use Illuminate\Support\Facades\Auth;

trait AlertasTrait
{
    public function getAlerta(array $dataxxxx)
    {


        $alertaxx = Alerta::where('cformula_id', $dataxxxx['objetoxx']->id)
            ->where('tipoaccion_id', $dataxxxx['tipoacci'])
            ->first();
        if (!isset($alertaxx->id)) {

            Alerta::create([
                'tipoaccion_id' => $dataxxxx['tipoacci'],
                'cformula_id' =>  $dataxxxx['objetoxx']->id,
                'leidaxxx' => false,
                'routexxx' => $dataxxxx['objetoxx']->id,
                'user_crea_id' => Auth::user()->id,
                'user_edita_id' => Auth::user()->id,
                'sis_esta_id' => 1
            ]);
            if ($dataxxxx['tipoacci']!=1) {
                $alertaxx = Alerta::where('tipoaccion_id', $dataxxxx['tipoacci']-1)
                ->where('cformula_id', $dataxxxx['objetoxx']->id)
                ->first();
                
            $alertaxx->update(['user_edita_id' => Auth::user()->id, 'leidaxxx' => true]);
            }
        
        }
    }
}
