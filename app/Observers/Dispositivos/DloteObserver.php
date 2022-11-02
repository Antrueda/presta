<?php

namespace App\Observers\Dispositivos;

use App\Models\Dispositivos\Dlote;
use App\Models\Dispositivos\Logs\HDlote;
use Illuminate\Support\Facades\Auth;

class DloteObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['fechvenc'] = $modeloxx->fechvenc;
        $log['dmarca_id'] = $modeloxx->dmarca_id;
        $log['inventar'] = $modeloxx->inventar;
        $log['lotexxxx'] = $modeloxx->lotexxxx;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        return $log;
    } 
    
    public function created(Dlote $modeloxx)
    {
        HDlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dlote "updated" event.
     *
     * @param  \App\Models\Administracion\Dlote  $modeloxx
     * @return void
     */
    public function updated(Dlote $modeloxx)
    {
        HDlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dlote "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dlote  $modeloxx
     * @return void
     */
    public function deleted(Dlote $modeloxx)
    {
        HDlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dlote "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dlote  $modeloxx
     * @return void
     */
    public function restored(Dlote $modeloxx)
    {
        HDlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dlote "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dlote  $modeloxx
     * @return void
     */
    public function forceDeleted(Dlote $modeloxx)
    {
        HDlote::create($this->getLog($modeloxx));
    }
}
