<?php

namespace App\Observers;

use App\Models\Logs\HUnidade;
use App\Models\Unidade;

class UnidadeObserver
{
    
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['unidad'] = $modeloxx->unidad;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    public function created(Unidade $modeloxx)
    {
        HUnidade::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "updated" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function updated(Unidade $modeloxx)
    {
        hUnidade::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function deleted(Unidade $modeloxx)
    {
        hUnidade::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function restored(Unidade $modeloxx)
    {
        hUnidade::create($this->getLog($modeloxx));
    }

    /**
     * Handle the unidad "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidad  $unidad
     * @return void
     */
    public function forceDeleted(Unidade $modeloxx)
    {
        hUnidade::create($this->getLog($modeloxx));
    }
}
