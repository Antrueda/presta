<?php

namespace App\Observers\Clinica;

use App\Models\Clinica\Clinica;
use App\Models\Clinica\Logs\HClinica;
use Illuminate\Support\Facades\Auth;

class ClinicaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['nitxxxxx'] = $modeloxx->nitxxxxx;
        $log['clinica'] = $modeloxx->clinica;
        $log['telefono'] = $modeloxx->telefono;
        $log['digiveri'] = $modeloxx->digiveri;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['metodoxx'] = request()->method();
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Clinica $modeloxx)
    {
        HClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Clinica $modeloxx)
    {
        HClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Clinica  $modeloxx
     * @return void
     */
    public function deleted(Clinica $modeloxx)
    {
        HClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Clinica  $modeloxx
     * @return void
     */
    public function restored(Clinica $modeloxx)
    {
        HClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Clinica  $modeloxx
     * @return void
     */
    public function forceDeleted(Clinica $modeloxx)
    {
        HClinica::create($this->getLog($modeloxx));
    }
}
