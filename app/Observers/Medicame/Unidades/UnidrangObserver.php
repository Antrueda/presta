<?php

namespace App\Observers\Medicame\Unidades;

use App\Models\Medicamentos\Unidad\Logs\HUnidrang;
use App\Models\Medicamentos\Unidad\Unidrang;

class UnidrangObserver
{
    private function getLog($metodoxx, $modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['unidad_id'] = $modeloxx->unidad_id;
        $log['rangonpt_id'] = $modeloxx->rangonpt_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['metodoxx'] = $metodoxx;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    }
    public function created(Unidrang $modeloxx)
    {
        HUnidrang::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the unidrang "updated" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidrang  $unidrang
     * @return void
     */
    public function updated(Unidrang $modeloxx)
    {
        HUnidrang::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the unidrang "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidrang  $unidrang
     * @return void
     */
    public function deleted(Unidrang $modeloxx)
    {
        HUnidrang::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the unidrang "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidrang  $unidrang
     * @return void
     */
    public function restored(Unidrang $modeloxx)
    {
        HUnidrang::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the unidrang "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Unidrang  $unidrang
     * @return void
     */
    public function forceDeleted(Unidrang $modeloxx)
    {
        HUnidrang::create($this->getLog(request()->method(),$modeloxx));
    }
}
