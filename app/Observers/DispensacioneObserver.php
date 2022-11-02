<?php

namespace App\Observers;

use App\Models\Dispensacione;
use App\Models\Logs\HDispensacione;
use Illuminate\Support\Facades\Auth;

class DispensacioneObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['fechaxxx'] = $modeloxx->fechaxxx;
        $log['opxxxxxx'] = $modeloxx->opxxxxxx;
        $log['producto'] = $modeloxx->producto;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Dispensacione $modeloxx)
    {
        HDispensacione::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dispensacione "updated" event.
     *
     * @param  \App\Models\Administracion\Dispensacione  $modeloxx
     * @return void
     */
    public function updated(Dispensacione $modeloxx)
    {
        HDispensacione::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dispensacione "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dispensacione  $modeloxx
     * @return void
     */
    public function deleted(Dispensacione $modeloxx)
    {
        HDispensacione::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dispensacione "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dispensacione  $modeloxx
     * @return void
     */
    public function restored(Dispensacione $modeloxx)
    {
        HDispensacione::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dispensacione "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dispensacione  $modeloxx
     * @return void
     */
    public function forceDeleted(Dispensacione $modeloxx)
    {
        HDispensacione::create($this->getLog($modeloxx));
    }
}
