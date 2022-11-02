<?php

namespace App\Observers\Administracion;

use App\Models\Administracion\Logs\HRango;
use App\Models\Administracion\Rango;
use Illuminate\Support\Facades\Auth;

class RangoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id'] = $modeloxx->id;
        $log['ranginic'] = $modeloxx->ranginic;
        $log['rangfina'] = $modeloxx->rangfina;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Rango $modeloxx)
    {
        HRango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rango "updated" event.
     *
     * @param  \App\Models\Administracion\Rango  $modeloxx
     * @return void
     */
    public function updated(Rango $modeloxx)
    {
        HRango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rango "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rango  $modeloxx
     * @return void
     */
    public function deleted(Rango $modeloxx)
    {
        HRango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rango "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rango  $modeloxx
     * @return void
     */
    public function restored(Rango $modeloxx)
    {
        HRango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rango "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rango  $modeloxx
     * @return void
     */
    public function forceDeleted(Rango $modeloxx)
    {
        HRango::create($this->getLog($modeloxx));
    }
}
