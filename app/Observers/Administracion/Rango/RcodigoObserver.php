<?php

namespace App\Observers\Administracion\Rango;

use App\Models\Administracion\Rango\Logs\HRcodigo;
use App\Models\Administracion\Rango\Rcodigo;
use Illuminate\Support\Facades\Auth;

class RcodigoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['rcondici_id'] = $modeloxx->rcondici_id;
        $log['codiprod'] = $modeloxx->codiprod;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Rcodigo $modeloxx)
    {
        HRcodigo::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcodigo "updated" event.
     *
     * @param  \App\Models\Administracion\Rcodigo  $modeloxx
     * @return void
     */
    public function updated(Rcodigo $modeloxx)
    {
        HRcodigo::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcodigo "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rcodigo  $modeloxx
     * @return void
     */
    public function deleted(Rcodigo $modeloxx)
    {
        HRcodigo::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcodigo "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rcodigo  $modeloxx
     * @return void
     */
    public function restored(Rcodigo $modeloxx)
    {
        HRcodigo::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcodigo "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rcodigo  $modeloxx
     * @return void
     */
    public function forceDeleted(Rcodigo $modeloxx)
    {
        HRcodigo::create($this->getLog($modeloxx));
    }
}
