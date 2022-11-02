<?php

namespace App\Observers\Medicame\Unidades;

use App\Models\Medicamentos\Unidad\Logs\HUrangnpt;
use App\Models\Medicamentos\Unidad\Urangnpt;
use Illuminate\Support\Facades\Auth;

class UrangnptObserver
{
    private function getLog($metodoxx, $modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['unidrang_id'] = $modeloxx->unidrang_id;
        $log['npt_id'] = $modeloxx->npt_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['metodoxx'] = $metodoxx;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    }
    public function created(Urangnpt $modeloxx)
    {
        HUrangnpt::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the urangnpt "updated" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Urangnpt  $urangnpt
     * @return void
     */
    public function updated(Urangnpt $modeloxx)
    {
        HUrangnpt::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the urangnpt "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Urangnpt  $urangnpt
     * @return void
     */
    public function deleted(Urangnpt $modeloxx)
    {
        HUrangnpt::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the urangnpt "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Urangnpt  $urangnpt
     * @return void
     */
    public function restored(Urangnpt $modeloxx)
    {
        HUrangnpt::create($this->getLog(request()->method(),$modeloxx));
    }

    /**
     * Handle the urangnpt "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Urangnpt  $urangnpt
     * @return void
     */
    public function forceDeleted(Urangnpt $modeloxx)
    {
        HUrangnpt::create($this->getLog(request()->method(),$modeloxx));
    }
}
