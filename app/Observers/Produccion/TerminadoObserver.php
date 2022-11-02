<?php

namespace App\Observers\Produccion;

use App\Models\Produccion\Logs\HTerminado;
use App\Models\Produccion\Terminado;
use Illuminate\Support\Facades\Auth;

class TerminadoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['completo'] = $modeloxx->completo;
        $log['particul'] = $modeloxx->particul;
        $log['integrid'] = $modeloxx->integrid;
        $log['contenid'] = $modeloxx->contenid;
        $log['fugasxxx'] = $modeloxx->fugasxxx;
        $log['miscelas'] = $modeloxx->miscelas;
        $log['burbujas'] = $modeloxx->burbujas;
        $log['document'] = $modeloxx->document;
        $log['teorico_'] = $modeloxx->teorico_;
        $log['realxxx_'] = $modeloxx->realxxx_;
        $log['pesobols'] = $modeloxx->pesobols;
        $log['limitesx'] = $modeloxx->limitesx;
        $log['concepto'] = $modeloxx->concepto;
        $log['estaterm'] = $modeloxx->estaterm;
        $log['nopasaxx'] = $modeloxx->nopasaxx;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Terminado $modeloxx)
    {
        HTerminado::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Terminado $modeloxx)
    {
        HTerminado::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Terminado "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Terminado  $modeloxx
     * @return void
     */
    public function deleted(Terminado $modeloxx)
    {
        HTerminado::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Terminado "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Terminado  $modeloxx
     * @return void
     */
    public function restored(Terminado $modeloxx)
    {
        HTerminado::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Terminado "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Terminado  $modeloxx
     * @return void
     */
    public function forceDeleted(Terminado $modeloxx)
    {
        HTerminado::create($this->getLog($modeloxx));
    }
}
