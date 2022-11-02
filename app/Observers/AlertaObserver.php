<?php

namespace App\Observers;

use App\Models\Alerta;
use App\Models\Logs\HAlerta;
use Illuminate\Support\Facades\Auth;

class AlertaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['leidaxxx'] = $modeloxx->leidaxxx;
        $log['routexxx'] = $modeloxx->routexxx;
        $log['tipoaccion_id'] = $modeloxx->tipoaccion_id;
        $log['cformula_id'] = $modeloxx->cformula_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Alerta $modeloxx)
    {
        HAlerta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Alerta "updated" event.
     *
     * @param  \App\Models\Administracion\Alerta  $modeloxx
     * @return void
     */
    public function updated(Alerta $modeloxx)
    {
        HAlerta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Alerta "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Alerta  $modeloxx
     * @return void
     */
    public function deleted(Alerta $modeloxx)
    {
        HAlerta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Alerta "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Alerta  $modeloxx
     * @return void
     */
    public function restored(Alerta $modeloxx)
    {
        HAlerta::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Alerta "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Alerta  $modeloxx
     * @return void
     */
    public function forceDeleted(Alerta $modeloxx)
    {
        HAlerta::create($this->getLog($modeloxx));
    }
}
