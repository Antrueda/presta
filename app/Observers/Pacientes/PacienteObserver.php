<?php

namespace App\Observers\Pacientes;

use App\Models\Pacientes\Logs\HPaciente;
use App\Models\Pacientes\Paciente;
use Illuminate\Support\Facades\Auth;

class PacienteObserver
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
    
    public function created(Paciente $modeloxx)
    {
        HPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Paciente $modeloxx)
    {
        HPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Paciente "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Paciente  $modeloxx
     * @return void
     */
    public function deleted(Paciente $modeloxx)
    {
        HPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Paciente "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Paciente  $modeloxx
     * @return void
     */
    public function restored(Paciente $modeloxx)
    {
        HPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Paciente "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Paciente  $modeloxx
     * @return void
     */
    public function forceDeleted(Paciente $modeloxx)
    {
        HPaciente::create($this->getLog($modeloxx));
    }
}
