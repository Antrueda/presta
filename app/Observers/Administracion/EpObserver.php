<?php

namespace App\Observers\Administracion;

use App\Models\Administracion\Ep;
use App\Models\Administracion\Logs\HEp;
use Illuminate\Support\Facades\Auth;

class EpObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id'] = $modeloxx->id;
        $log['nombre'] = $modeloxx->nombre;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Ep $modeloxx)
    {
        HEp::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Ep "updated" event.
     *
     * @param  \App\Models\Administracion\Ep  $modeloxx
     * @return void
     */
    public function updated(Ep $modeloxx)
    {
        HEp::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Ep "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Ep  $modeloxx
     * @return void
     */
    public function deleted(Ep $modeloxx)
    {
        HEp::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Ep "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Ep  $modeloxx
     * @return void
     */
    public function restored(Ep $modeloxx)
    {
        HEp::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Ep "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Ep  $modeloxx
     * @return void
     */
    public function forceDeleted(Ep $modeloxx)
    {
        HEp::create($this->getLog($modeloxx));
    }
}
