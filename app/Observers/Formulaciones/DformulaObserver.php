<?php

namespace App\Observers\Formulaciones;

use App\Models\Formulaciones\Dformula;
use App\Models\Formulaciones\Logs\HDformula;
use Illuminate\Support\Facades\Auth;

class DformulaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['cformula_id'] = $modeloxx->cformula_id;
        $log['medicame_id'] = $modeloxx->medicame_id;
        $log['preparar'] = $modeloxx->preparar;
        $log['cantidad'] = $modeloxx->cantidad;
        $log['rtotal'] = $modeloxx->rtotal;
        $log['volumen'] = $modeloxx->volumen;
        $log['purga'] = $modeloxx->purga;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Dformula $modeloxx)
    {
        HDformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Dformula $modeloxx)
    {
        HDformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dformula "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dformula  $modeloxx
     * @return void
     */
    public function deleted(Dformula $modeloxx)
    {
        HDformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dformula "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dformula  $modeloxx
     * @return void
     */
    public function restored(Dformula $modeloxx)
    {
        HDformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Dformula "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Dformula  $modeloxx
     * @return void
     */
    public function forceDeleted(Dformula $modeloxx)
    {
        HDformula::create($this->getLog($modeloxx));
    }
}
