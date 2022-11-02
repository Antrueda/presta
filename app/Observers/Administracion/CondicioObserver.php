<?php

namespace App\Observers\Administracion;

use App\Models\Administracion\Condicio;
use App\Models\Administracion\Logs\HCondicio;
use Illuminate\Support\Facades\Auth;

class CondicioObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id'] = $modeloxx->id;
        $log['condicio'] = $modeloxx->condicio;
        $log['consinli'] = $modeloxx->consinli;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Condicio $modeloxx)
    {
        HCondicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Condicio "updated" event.
     *
     * @param  \App\Models\Administracion\Condicio  $modeloxx
     * @return void
     */
    public function updated(Condicio $modeloxx)
    {
        HCondicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Condicio "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Condicio  $modeloxx
     * @return void
     */
    public function deleted(Condicio $modeloxx)
    {
        HCondicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Condicio "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Condicio  $modeloxx
     * @return void
     */
    public function restored(Condicio $modeloxx)
    {
        HCondicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Condicio "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Condicio  $modeloxx
     * @return void
     */
    public function forceDeleted(Condicio $modeloxx)
    {
        HCondicio::create($this->getLog($modeloxx));
    }
}
