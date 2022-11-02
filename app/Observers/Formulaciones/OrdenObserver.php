<?php

namespace App\Observers\Formulaciones;

use App\Models\Formulaciones\Logs\HOrden;
use App\Models\Formulaciones\Orden;
use Illuminate\Support\Facades\Auth;

class OrdenObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['ordeprod'] = $modeloxx->ordeprod;
        $log['observac'] = $modeloxx->observac;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Orden $modeloxx)
    {
        HOrden::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Orden $modeloxx)
    {
        HOrden::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dformula "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dformula  $modeloxx
     * @return void
     */
    public function deleted(Orden $modeloxx)
    {
        HOrden::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dformula "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dformula  $modeloxx
     * @return void
     */
    public function restored(Orden $modeloxx)
    {
        HOrden::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dformula "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dformula  $modeloxx
     * @return void
     */
    public function forceDeleted(Orden $modeloxx)
    {
        HOrden::create($this->getLog($modeloxx));
    }
}
