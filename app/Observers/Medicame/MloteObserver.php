<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\Logs\HMlote;
use App\Models\Medicamentos\Mlote;
use Illuminate\Support\Facades\Auth;

class MloteObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['fechvenc'] = $modeloxx->fechvenc;
        $log['minvima_id'] = $modeloxx->minvima_id;
        $log['inventar'] = $modeloxx->inventar;
        $log['lotexxxx'] = $modeloxx->lotexxxx;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Mlote $modeloxx)
    {
        HMlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Mlote $modeloxx)
    {
        HMlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mlote "deleted" event.
     *
     * @param  \App\Models\Mlotentos\Unidad\Mlote  $modeloxx
     * @return void
     */
    public function deleted(Mlote $modeloxx)
    {
        HMlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mlote "restored" event.
     *
     * @param  \App\Models\Mlotentos\Unidad\Mlote  $modeloxx
     * @return void
     */
    public function restored(Mlote $modeloxx)
    {
        HMlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mlote "force deleted" event.
     *
     * @param  \App\Models\Mlotentos\Unidad\Mlote  $modeloxx
     * @return void
     */
    public function forceDeleted(Mlote $modeloxx)
    {
        HMlote::create($this->getLog($modeloxx));
    }
}
