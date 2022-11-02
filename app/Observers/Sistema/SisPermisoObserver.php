<?php

namespace App\Observers\Sistema;

use App\Models\Sistema\Logs\HSisPermiso;
use App\Models\Sistema\SisPermiso;
use Illuminate\Support\Facades\Auth;

class SisPermisoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['name'] = $modeloxx->name;
        $log['guard_name'] = $modeloxx->guard_name;
        $log['descripc'] = $modeloxx->descripc;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(SisPermiso $modeloxx)
    {
        HSisPermiso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(SisPermiso $modeloxx)
    {
        HSisPermiso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisPermiso "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisPermiso  $modeloxx
     * @return void
     */
    public function deleted(SisPermiso $modeloxx)
    {
        HSisPermiso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisPermiso "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisPermiso  $modeloxx
     * @return void
     */
    public function restored(SisPermiso $modeloxx)
    {
        HSisPermiso::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisPermiso "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisPermiso  $modeloxx
     * @return void
     */
    public function forceDeleted(SisPermiso $modeloxx)
    {
        HSisPermiso::create($this->getLog($modeloxx));
    }
}
