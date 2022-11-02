<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\Logs\HMinvima;
use App\Models\Medicamentos\Minvima;
use Illuminate\Support\Facades\Auth;

class MinvimaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['reginvim'] = $modeloxx->reginvim;
        $log['mmarca_id'] = $modeloxx->mmarca_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Minvima $modeloxx)
    {
        HMinvima::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Minvima $modeloxx)
    {
        HMinvima::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Minvima "deleted" event.
     *
     * @param  \App\Models\Minvimantos\Unidad\Minvima  $modeloxx
     * @return void
     */
    public function deleted(Minvima $modeloxx)
    {
        HMinvima::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Minvima "restored" event.
     *
     * @param  \App\Models\Minvimantos\Unidad\Minvima  $modeloxx
     * @return void
     */
    public function restored(Minvima $modeloxx)
    {
        HMinvima::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Minvima "force deleted" event.
     *
     * @param  \App\Models\Minvimantos\Unidad\Minvima  $modeloxx
     * @return void
     */
    public function forceDeleted(Minvima $modeloxx)
    {
        HMinvima::create($this->getLog($modeloxx));
    }
}
