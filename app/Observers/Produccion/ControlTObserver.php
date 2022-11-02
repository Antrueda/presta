<?php

namespace App\Observers\Produccion;


use App\Models\Produccion\ControlT;
use App\Models\Produccion\Logs\HControlT;
use Illuminate\Support\Facades\Auth;

class ControlTObserver
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

    public function created(ControlT $modeloxx)
    {
        HControlT::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(ControlT $modeloxx)
    {
        HControlT::create($this->getLog($modeloxx));
    }

    /**
     * Handle the ControlT "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\ControlT  $modeloxx
     * @return void
     */
    public function deleted(ControlT $modeloxx)
    {
        HControlT::create($this->getLog($modeloxx));
    }

    /**
     * Handle the ControlT "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\ControlT  $modeloxx
     * @return void
     */
    public function restored(ControlT $modeloxx)
    {
        HControlT::create($this->getLog($modeloxx));
    }

    /**
     * Handle the ControlT "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\ControlT  $modeloxx
     * @return void
     */
    public function forceDeleted(ControlT $modeloxx)
    {
        HControlT::create($this->getLog($modeloxx));
    }
}
