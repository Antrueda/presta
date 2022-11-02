<?php

namespace App\Observers\Pacientes;


use App\Models\Pacientes\Logs\HPacienteServicio;


use App\Models\Pacientes\PacienteServicio;
use Illuminate\Support\Facades\Auth;

class PacienteServicioObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['paciente_id'] = $modeloxx->paciente_id;
        $log['servicio_id'] = $modeloxx->servicio_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(PacienteServicio $modeloxx)
    {
        HPacienteServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(PacienteServicio $modeloxx)
    {
        HPacienteServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the PacienteServicio "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\PacienteServicio  $modeloxx
     * @return void
     */
    public function deleted(PacienteServicio $modeloxx)
    {
        HPacienteServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the PacienteServicio "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\PacienteServicio  $modeloxx
     * @return void
     */
    public function restored(PacienteServicio $modeloxx)
    {
        HPacienteServicio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the PacienteServicio "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\PacienteServicio  $modeloxx
     * @return void
     */
    public function forceDeleted(PacienteServicio $modeloxx)
    {
        HPacienteServicio::create($this->getLog($modeloxx));
    }
}
