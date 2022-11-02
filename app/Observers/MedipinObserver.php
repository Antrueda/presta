<?php

namespace App\Observers;

use App\Models\Medipin;
use App\Models\Logs\HMedipin;
use Illuminate\Support\Facades\Auth;

class MedipinObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['casa_id'] = $modeloxx->casa_id;
        $log['casa'] = $modeloxx->casa;
        $log['ordeneon'] = $modeloxx->ordeneon;
        $log['campo_id'] = $modeloxx->campo_id;
        $log['listneon'] = $modeloxx->listneon;
        $log['ordepedi'] = $modeloxx->ordepedi;
        $log['listpedi'] = $modeloxx->listpedi;
        $log['ordeadul'] = $modeloxx->ordeadul;
        $log['listadul'] = $modeloxx->listadul;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Medipin $modeloxx)
    {
        HMedipin::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Medipin "updated" event.
     *
     * @param  \App\Models\Administracion\Medipin  $modeloxx
     * @return void
     */
    public function updated(Medipin $modeloxx)
    {
        HMedipin::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Medipin "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Medipin  $modeloxx
     * @return void
     */
    public function deleted(Medipin $modeloxx)
    {
        HMedipin::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Medipin "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Medipin  $modeloxx
     * @return void
     */
    public function restored(Medipin $modeloxx)
    {
        HMedipin::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Medipin "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Medipin  $modeloxx
     * @return void
     */
    public function forceDeleted(Medipin $modeloxx)
    {
        HMedipin::create($this->getLog($modeloxx));
    }
}
