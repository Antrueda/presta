<?php

namespace App\Observers\Produccion;

use App\Models\Produccion\Logs\HPreparacion;
use App\Models\Produccion\Preparacion;
use Illuminate\Support\Facades\Auth;

class PreparacionObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['registro'] = $modeloxx->registro;
        $log['cedula'] = $modeloxx->cedula;
        $log['nombres'] = $modeloxx->nombres;
        $log['apellidos'] = $modeloxx->apellidos;
        $log['peso'] = $modeloxx->peso;
        $log['genero_id'] = $modeloxx->genero_id;
        $log['ep_id'] = $modeloxx->ep_id;
        $log['cama'] = $modeloxx->cama;
        $log['fechnaci'] = $modeloxx->fechnaci;
        $log['municipio_id'] = $modeloxx->municipio_id;
        $log['npt_id'] = $modeloxx->npt_id;
        $log['servicio_id'] = $modeloxx->servicio_id;
        $log['sis_clinica_id'] = $modeloxx->sis_clinica_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Preparacion $modeloxx)
    {
        HPreparacion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Preparacion $modeloxx)
    {
        HPreparacion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Preparacion "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Preparacion  $modeloxx
     * @return void
     */
    public function deleted(Preparacion $modeloxx)
    {
        HPreparacion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Preparacion "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Preparacion  $modeloxx
     * @return void
     */
    public function restored(Preparacion $modeloxx)
    {
        HPreparacion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Preparacion "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Preparacion  $modeloxx
     * @return void
     */
    public function forceDeleted(Preparacion $modeloxx)
    {
        HPreparacion::create($this->getLog($modeloxx));
    }
}
