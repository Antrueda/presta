<?php

namespace App\Observers\Sistema;

use App\Models\Sistema\SisEsta;
use App\Models\Sistema\Logs\HSisEsta;
use Illuminate\Support\Facades\Auth;

class SisEstaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['s_estado'] = $modeloxx->s_estado;
        $log['i_estado'] = $modeloxx->i_estado;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(SisEsta $modeloxx)
    {
        HSisEsta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(SisEsta $modeloxx)
    {
        HSisEsta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisEsta "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisEsta  $modeloxx
     * @return void
     */
    public function deleted(SisEsta $modeloxx)
    {
        HSisEsta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisEsta "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisEsta  $modeloxx
     * @return void
     */
    public function restored(SisEsta $modeloxx)
    {
        HSisEsta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisEsta "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisEsta  $modeloxx
     * @return void
     */
    public function forceDeleted(SisEsta $modeloxx)
    {
        HSisEsta::create($this->getLog($modeloxx));
    }
}
