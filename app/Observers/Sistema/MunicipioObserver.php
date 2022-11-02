<?php

namespace App\Observers\Sistema;

use App\Models\Sistema\Logs\HMunicipio;
use App\Models\Sistema\Municipio;
use Illuminate\Support\Facades\Auth;

class MunicipioObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['nombre'] = $modeloxx->nombre;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Municipio $modeloxx)
    {
        HMunicipio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Municipio $modeloxx)
    {
        HMunicipio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Municipio "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Municipio  $modeloxx
     * @return void
     */
    public function deleted(Municipio $modeloxx)
    {
        HMunicipio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Municipio "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Municipio  $modeloxx
     * @return void
     */
    public function restored(Municipio $modeloxx)
    {
        HMunicipio::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Municipio "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Municipio  $modeloxx
     * @return void
     */
    public function forceDeleted(Municipio $modeloxx)
    {
        HMunicipio::create($this->getLog($modeloxx));
    }
}
