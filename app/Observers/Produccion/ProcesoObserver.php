<?php

namespace App\Observers\Produccion;

use App\Models\Produccion\Logs\HProceso;
use App\Models\Produccion\Proceso;
use Illuminate\Support\Facades\Auth;

class ProcesoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['coloraci'] = $modeloxx->coloraci;
        $log['ausepart'] = $modeloxx->ausepart;
        $log['ausefuga'] = $modeloxx->ausefuga;
        $log['ausemise'] = $modeloxx->ausemise;
        $log['nopasaxx'] = $modeloxx->nopasaxx;
        $log['listermi'] = $modeloxx->listermi;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Proceso $modeloxx)
    {
        HProceso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Proceso $modeloxx)
    {
        HProceso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Proceso "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Proceso  $modeloxx
     * @return void
     */
    public function deleted(Proceso $modeloxx)
    {
        HProceso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Proceso "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Proceso  $modeloxx
     * @return void
     */
    public function restored(Proceso $modeloxx)
    {
        HProceso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Proceso "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Proceso  $modeloxx
     * @return void
     */
    public function forceDeleted(Proceso $modeloxx)
    {
        HProceso::create($this->getLog($modeloxx));
    }
}
