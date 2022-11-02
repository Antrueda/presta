<?php

namespace App\Observers\Administracion\Rango;

use App\Models\Administracion\Rango\Logs\HRnpt;
use App\Models\Administracion\Rango\Rnpt;
use Illuminate\Support\Facades\Auth;

class RnptObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['rango_id'] = $modeloxx->rango_id;
        $log['npt_id'] = $modeloxx->npt_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Rnpt $modeloxx)
    {
        HRnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rnpt "updated" event.
     *
     * @param  \App\Models\Administracion\Rnpt  $modeloxx
     * @return void
     */
    public function updated(Rnpt $modeloxx)
    {
        HRnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rnpt "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rnpt  $modeloxx
     * @return void
     */
    public function deleted(Rnpt $modeloxx)
    {
        HRnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rnpt "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rnpt  $modeloxx
     * @return void
     */
    public function restored(Rnpt $modeloxx)
    {
        HRnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rnpt "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rnpt  $modeloxx
     * @return void
     */
    public function forceDeleted(Rnpt $modeloxx)
    {
        HRnpt::create($this->getLog($modeloxx));
    }
}
