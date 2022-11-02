<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Logs\HCasa;
use Illuminate\Support\Facades\Auth;

class CasaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['casa'] = $modeloxx->casa;
        $log['ordecasa'] = $modeloxx->ordecasa;
        $log['nameidxx'] = $modeloxx->nameidxx;
        $log['unidmedi'] = $modeloxx->unidmedi;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Casa $modeloxx)
    {
        HCasa::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Casa $modeloxx)
    {
        HCasa::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Casa "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Casa  $modeloxx
     * @return void
     */
    public function deleted(Casa $modeloxx)
    {
        HCasa::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Casa "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Casa  $modeloxx
     * @return void
     */
    public function restored(Casa $modeloxx)
    {
        HCasa::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Casa "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Casa  $modeloxx
     * @return void
     */
    public function forceDeleted(Casa $modeloxx)
    {
        HCasa::create($this->getLog($modeloxx));
    }
}
