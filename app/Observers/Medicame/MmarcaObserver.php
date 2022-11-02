<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\Logs\HMmarca;
use App\Models\Medicamentos\Mmarca;
use Illuminate\Support\Facades\Auth;

class MmarcaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['nombcome'] = $modeloxx->nombcome;
        $log['osmorali'] = $modeloxx->osmorali;
        $log['pesoespe'] = $modeloxx->pesoespe;
        $log['formfarm'] = $modeloxx->formfarm;
        $log['marcaxxx'] = $modeloxx->marcaxxx;
        $log['medicame_id'] = $modeloxx->medicame_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Mmarca $modeloxx)
    {
        HMmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Mmarca $modeloxx)
    {
        HMmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mmarca "deleted" event.
     *
     * @param  \App\Models\Mmarcantos\Unidad\Mmarca  $modeloxx
     * @return void
     */
    public function deleted(Mmarca $modeloxx)
    {
        HMmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mmarca "restored" event.
     *
     * @param  \App\Models\Mmarcantos\Unidad\Mmarca  $modeloxx
     * @return void
     */
    public function restored(Mmarca $modeloxx)
    {
        HMmarca::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mmarca "force deleted" event.
     *
     * @param  \App\Models\Mmarcantos\Unidad\Mmarca  $modeloxx
     * @return void
     */
    public function forceDeleted(Mmarca $modeloxx)
    {
        HMmarca::create($this->getLog($modeloxx));
    }
}
