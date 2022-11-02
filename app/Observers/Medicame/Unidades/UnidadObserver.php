<?php

namespace App\Observers\Medicame\Unidades;

use App\Models\Medicamentos\Unidad\Logs\HUnidad;
use App\Models\Medicamentos\Unidad\Unidad;

class UnidadObserver
{
    
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['s_unidad'] = $modeloxx->s_unidad;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    public function created(Unidad $modeloxx)
    {
        HUnidad::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "updated" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function updated(Unidad $modeloxx)
    {
        HUnidad::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function deleted(Unidad $modeloxx)
    {
        HUnidad::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function restored(Unidad $modeloxx)
    {
        HUnidad::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function forceDeleted(Unidad $modeloxx)
    {
        HUnidad::create($this->getLog($modeloxx));
    }
}
