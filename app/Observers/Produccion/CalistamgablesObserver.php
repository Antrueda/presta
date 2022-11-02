<?php

namespace App\Observers\Produccion;

use App\Models\Produccion\Calistamgables;
use App\Models\Produccion\Logs\HCalistamgables;
use Illuminate\Support\Facades\Auth;

class CalistamgablesObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['unidad'] = $modeloxx->unidad;
        $log['cantcons'] = $modeloxx->cantcons;
        $log['diferenc'] = $modeloxx->diferenc;
        $log['calistamgable_id'] = $modeloxx->calistamgable_id;
        $log['calistamgable_type'] = $modeloxx->calistamgable_type;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Calistamgables $modeloxx)
    {
        HCalistamgables::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Calistamgables $modeloxx)
    {
        HCalistamgables::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Calistamgables "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Calistamgables  $modeloxx
     * @return void
     */
    public function deleted(Calistamgables $modeloxx)
    {
        HCalistamgables::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Calistamgables "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Calistamgables  $modeloxx
     * @return void
     */
    public function restored(Calistamgables $modeloxx)
    {
        HCalistamgables::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Calistamgables "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Calistamgables  $modeloxx
     * @return void
     */
    public function forceDeleted(Calistamgables $modeloxx)
    {
        HCalistamgables::create($this->getLog($modeloxx));
    }
}
