<?php

namespace App\Observers\Formulaciones;

use App\Models\Formulaciones\Dfmlote;
use App\Models\Formulaciones\Logs\HDfmlote;
use Illuminate\Support\Facades\Auth;

class DfmloteObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['dformula_id'] = $modeloxx->dformula_id;
        $log['mlote_id'] = $modeloxx->mlote_id;
        $log['volumenx'] = $modeloxx->volumenx;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Dfmlote $modeloxx)
    {
        HDfmlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Dfmlote $modeloxx)
    {
        HDfmlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dfmlote "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dfmlote  $modeloxx
     * @return void
     */
    public function deleted(Dfmlote $modeloxx)
    {
        HDfmlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dfmlote "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dfmlote  $modeloxx
     * @return void
     */
    public function restored(Dfmlote $modeloxx)
    {
        HDfmlote::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dfmlote "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dfmlote  $modeloxx
     * @return void
     */
    public function forceDeleted(Dfmlote $modeloxx)
    {
        HDfmlote::create($this->getLog($modeloxx));
    }
}
