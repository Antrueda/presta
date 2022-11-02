<?php

namespace App\Observers\Administracion;


use App\Models\Administracion\Logs\HServicio;
use App\Models\Administracion\Servicio;
use Illuminate\Support\Facades\Auth;

class ServicioObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id'] = $modeloxx->id;
        $log['servicio'] = $modeloxx->servicio;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Servicio $modeloxx)
    {
        HServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Servicio "updated" event.
     *
     * @param  \App\Models\Administracion\Servicio  $modeloxx
     * @return void
     */
    public function updated(Servicio $modeloxx)
    {
        HServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Servicio "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Servicio  $modeloxx
     * @return void
     */
    public function deleted(Servicio $modeloxx)
    {
        HServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Servicio "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Servicio  $modeloxx
     * @return void
     */
    public function restored(Servicio $modeloxx)
    {
        HServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Servicio "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Servicio  $modeloxx
     * @return void
     */
    public function forceDeleted(Servicio $modeloxx)
    {
        HServicio::create($this->getLog($modeloxx));
    }
}
