<?php

namespace App\Observers\Dispositivos;

use App\Models\Dispositivos\Dmarca;
use App\Models\Dispositivos\Logs\HDmarca;
use Illuminate\Support\Facades\Auth;

class DmarcaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['reginvim'] = $modeloxx->reginvim;
        $log['dmedico_id'] = $modeloxx->dmedico_id;
        $log['marcaxxx'] = $modeloxx->marcaxxx;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        return $log;
    } 
    
    public function created(Dmarca $modeloxx)
    {
        HDmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmarca "updated" event.
     *
     * @param  \App\Models\Administracion\Dmarca  $modeloxx
     * @return void
     */
    public function updated(Dmarca $modeloxx)
    {
        HDmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmarca "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dmarca  $modeloxx
     * @return void
     */
    public function deleted(Dmarca $modeloxx)
    {
        HDmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmarca "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dmarca  $modeloxx
     * @return void
     */
    public function restored(Dmarca $modeloxx)
    {
        HDmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmarca "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dmarca  $modeloxx
     * @return void
     */
    public function forceDeleted(Dmarca $modeloxx)
    {
        HDmarca::create($this->getLog($modeloxx));
    }
}
