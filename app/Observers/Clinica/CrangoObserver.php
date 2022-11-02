<?php

namespace App\Observers\Clinica;


use App\Models\Clinica\Crango;
use App\Models\Clinica\Logs\HCrango;
use Illuminate\Support\Facades\Auth;

class CrangoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['sis_clinica_id'] = $modeloxx->sis_clinica_id;
        $log['rcodigo_id'] = $modeloxx->rcodigo_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Crango $modeloxx)
    {
        HCrango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Crango "updated" event.
     *
     * @param  \App\Models\Administracion\Crango  $modeloxx
     * @return void
     */
    public function updated(Crango $modeloxx)
    {
        HCrango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Crango "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Crango  $modeloxx
     * @return void
     */
    public function deleted(Crango $modeloxx)
    {
        HCrango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Crango "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Crango  $modeloxx
     * @return void
     */
    public function restored(Crango $modeloxx)
    {
        HCrango::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Crango "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Crango  $modeloxx
     * @return void
     */
    public function forceDeleted(Crango $modeloxx)
    {
        HCrango::create($this->getLog($modeloxx));
    }
}
