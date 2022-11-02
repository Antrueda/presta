<?php

namespace App\Observers\Pacientes;


use App\Models\Pacientes\Logs\HPacientec;
use App\Models\Pacientes\Pacientec;
use Illuminate\Support\Facades\Auth;

class PacientecObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['registro'] = $modeloxx->registro;
        $log['cedula'] = $modeloxx->cedula;
        $log['nombres'] = $modeloxx->nombres;
        $log['apelldios'] = $modeloxx->apelldios;
        $log['peso'] = $modeloxx->peso;
        $log['genero_id'] = $modeloxx->genero_id;
        $log['ep_id'] = $modeloxx->ep_id;
        $log['cama'] = $modeloxx->cama;
        $log['fechnaci'] = $modeloxx->fechnaci;
        $log['departamento_id'] = $modeloxx->departamento_id;
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
    
    public function created(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Pacientec "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Pacientec  $modeloxx
     * @return void
     */
    public function deleted(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Pacientec "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Pacientec  $modeloxx
     * @return void
     */
    public function restored(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Pacientec "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Pacientec  $modeloxx
     * @return void
     */
    public function forceDeleted(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }
}
