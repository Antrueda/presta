<?php

namespace App\Observers;

use App\Models\Roleext;
use App\Models\Logs\HRoleext;
use Illuminate\Support\Facades\Auth;

class RoleextObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['nombre'] = $modeloxx->nombre;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Roleext $modeloxx)
    {
        HRoleext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Roleext "updated" event.
     *
     * @param  \App\Models\Administracion\Roleext  $modeloxx
     * @return void
     */
    public function updated(Roleext $modeloxx)
    {
        HRoleext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Roleext "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Roleext  $modeloxx
     * @return void
     */
    public function deleted(Roleext $modeloxx)
    {
        HRoleext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Roleext "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Roleext  $modeloxx
     * @return void
     */
    public function restored(Roleext $modeloxx)
    {
        HRoleext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Roleext "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Roleext  $modeloxx
     * @return void
     */
    public function forceDeleted(Roleext $modeloxx)
    {
        HRoleext::create($this->getLog($modeloxx));
    }
}
