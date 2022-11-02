<?php

namespace App\Observers\Produccion;

use App\Models\Produccion\Calistam;
use App\Models\Produccion\Logs\HCalistam;
use Illuminate\Support\Facades\Auth;

class CalistamObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['producto'] = $modeloxx->producto;
        $log['orden_id'] = $modeloxx->orden_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Calistam $modeloxx)
    {
        HCalistam::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Calistam $modeloxx)
    {
        HCalistam::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Calistam "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Calistam  $modeloxx
     * @return void
     */
    public function deleted(Calistam $modeloxx)
    {
        HCalistam::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Calistam "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Calistam  $modeloxx
     * @return void
     */
    public function restored(Calistam $modeloxx)
    {
        HCalistam::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Calistam "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Calistam  $modeloxx
     * @return void
     */
    public function forceDeleted(Calistam $modeloxx)
    {
        HCalistam::create($this->getLog($modeloxx));
    }
}
