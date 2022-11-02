<?php

namespace App\Observers\Administracion\Rango;

use App\Models\Administracion\Rango\Logs\HRcondici;
use App\Models\Administracion\Rango\Rcondici;
use Illuminate\Support\Facades\Auth;

class RcondiciObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['rnpt_id'] = $modeloxx->rnpt_id;
        $log['condicio_id'] = $modeloxx->condicio_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Rcondici $modeloxx)
    {
        HRcondici::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcondici "updated" event.
     *
     * @param  \App\Models\Administracion\Rcondici  $modeloxx
     * @return void
     */
    public function updated(Rcondici $modeloxx)
    {
        HRcondici::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcondici "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rcondici  $modeloxx
     * @return void
     */
    public function deleted(Rcondici $modeloxx)
    {
        HRcondici::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcondici "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rcondici  $modeloxx
     * @return void
     */
    public function restored(Rcondici $modeloxx)
    {
        HRcondici::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rcondici "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rcondici  $modeloxx
     * @return void
     */
    public function forceDeleted(Rcondici $modeloxx)
    {
        HRcondici::create($this->getLog($modeloxx));
    }
}
