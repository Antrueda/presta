<?php

namespace App\Observers;

use App\Models\Permissionext;
use App\Models\Logs\HPermissionext;
use Illuminate\Support\Facades\Auth;

class PermissionextObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['name'] = $modeloxx->name;
        $log['guard_name'] = $modeloxx->guard_name;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Permissionext $modeloxx)
    {
        HPermissionext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Permissionext "updated" event.
     *
     * @param  \App\Models\Administracion\Permissionext  $modeloxx
     * @return void
     */
    public function updated(Permissionext $modeloxx)
    {
        HPermissionext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Permissionext "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Permissionext  $modeloxx
     * @return void
     */
    public function deleted(Permissionext $modeloxx)
    {
        HPermissionext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Permissionext "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Permissionext  $modeloxx
     * @return void
     */
    public function restored(Permissionext $modeloxx)
    {
        HPermissionext::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Permissionext "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Permissionext  $modeloxx
     * @return void
     */
    public function forceDeleted(Permissionext $modeloxx)
    {
        HPermissionext::create($this->getLog($modeloxx));
    }
}
