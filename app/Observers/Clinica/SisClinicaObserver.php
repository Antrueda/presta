<?php

namespace App\Observers\Clinica;

use App\Models\Clinica\Logs\HSisClinica;
use App\Models\Clinica\SisClinica;
use Illuminate\Support\Facades\Auth;

class SisClinicaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['sucursal'] = $modeloxx->sucursal;
        $log['clinica_id'] = $modeloxx->clinica_id;
        $log['municipio_id'] = $modeloxx->municipio_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['metodoxx'] = request()->method();
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(SisClinica $modeloxx)
    {
        HSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisClinica "updated" event.
     *
     * @param  \App\Models\Administracion\SisClinica  $modeloxx
     * @return void
     */
    public function updated(SisClinica $modeloxx)
    {
        HSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisClinica "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisClinica  $modeloxx
     * @return void
     */
    public function deleted(SisClinica $modeloxx)
    {
        HSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisClinica "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisClinica  $modeloxx
     * @return void
     */
    public function restored(SisClinica $modeloxx)
    {
        HSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the SisClinica "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\SisClinica  $modeloxx
     * @return void
     */
    public function forceDeleted(SisClinica $modeloxx)
    {
        HSisClinica::create($this->getLog($modeloxx));
    }
}
