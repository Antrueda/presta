<?php

namespace App\Observers\Usuarios;

use App\Models\Usuarios\Logs\HRol;
use App\Models\Usuarios\Rol;
use Illuminate\Support\Facades\Auth;

class RolObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['name'] = $modeloxx->name;
        $log['guard_name'] = $modeloxx->guard_name;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Rol $modeloxx)
    {
        HRol::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Rol $modeloxx)
    {
        HRol::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rol "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rol  $modeloxx
     * @return void
     */
    public function deleted(Rol $modeloxx)
    {
        HRol::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rol "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rol  $modeloxx
     * @return void
     */
    public function restored(Rol $modeloxx)
    {
        HRol::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Rol "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rol  $modeloxx
     * @return void
     */
    public function forceDeleted(Rol $modeloxx)
    {
        HRol::create($this->getLog($modeloxx));
    }
}
