<?php

namespace App\Observers\Sistema;

use App\Models\Sistema\Departamento;
use App\Models\Sistema\Logs\HDepartamento;
use Illuminate\Support\Facades\Auth;

class DepartamentoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['nombre'] = $modeloxx->nombre;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Departamento $modeloxx)
    {
        HDepartamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Departamento $modeloxx)
    {
        HDepartamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Departamento "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Departamento  $modeloxx
     * @return void
     */
    public function deleted(Departamento $modeloxx)
    {
        HDepartamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Departamento "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Departamento  $modeloxx
     * @return void
     */
    public function restored(Departamento $modeloxx)
    {
        HDepartamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Departamento "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Departamento  $modeloxx
     * @return void
     */
    public function forceDeleted(Departamento $modeloxx)
    {
        HDepartamento::create($this->getLog($modeloxx));
    }
}
