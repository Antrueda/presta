<?php

namespace App\Observers;

use App\Models\Remision;
use App\Models\Logs\HRemision;
use Illuminate\Support\Facades\Auth;

class RemisionObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['orden_id'] = $modeloxx->orden_id;
        $log['clinica_id'] = $modeloxx->clinica_id;
        $log['quimfarm_id'] = $modeloxx->quimfarm_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Remision $modeloxx)
    {
        HRemision::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Remision "updated" event.
     *
     * @param  \App\Models\Administracion\Remision  $modeloxx
     * @return void
     */
    public function updated(Remision $modeloxx)
    {
        HRemision::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Remision "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Remision  $modeloxx
     * @return void
     */
    public function deleted(Remision $modeloxx)
    {
        HRemision::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Remision "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Remision  $modeloxx
     * @return void
     */
    public function restored(Remision $modeloxx)
    {
        HRemision::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Remision "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Remision  $modeloxx
     * @return void
     */
    public function forceDeleted(Remision $modeloxx)
    {
        HRemision::create($this->getLog($modeloxx));
    }
}
