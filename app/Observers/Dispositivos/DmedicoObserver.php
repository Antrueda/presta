<?php

namespace App\Observers\Dispositivos;

use App\Models\Dispositivos\Dmedico;
use App\Models\Dispositivos\Logs\HDmedico;
use Illuminate\Support\Facades\Auth;

class DmedicoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['nombrexx'] = $modeloxx->nombrexx;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        return $log;
    } 
    
    public function created(Dmedico $modeloxx)
    {
        HDmedico::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmedico "updated" event.
     *
     * @param  \App\Models\Administracion\Dmedico  $modeloxx
     * @return void
     */
    public function updated(Dmedico $modeloxx)
    {
        HDmedico::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmedico "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dmedico  $modeloxx
     * @return void
     */
    public function deleted(Dmedico $modeloxx)
    {
        HDmedico::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmedico "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dmedico  $modeloxx
     * @return void
     */
    public function restored(Dmedico $modeloxx)
    {
        HDmedico::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dmedico "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dmedico  $modeloxx
     * @return void
     */
    public function forceDeleted(Dmedico $modeloxx)
    {
        HDmedico::create($this->getLog($modeloxx));
    }
}
