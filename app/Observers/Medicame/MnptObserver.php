<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\Logs\HMnpt;
use App\Models\Medicamentos\Mnpt;
use Illuminate\Support\Facades\Auth;

class MnptObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['medicame_id'] = $modeloxx->medicame_id;
        $log['urangnpt_id'] = $modeloxx->urangnpt_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Mnpt $modeloxx)
    {
        HMnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Mnpt $modeloxx)
    {
        HMnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mnpt "deleted" event.
     *
     * @param  \App\Models\Mnptntos\Unidad\Mnpt  $modeloxx
     * @return void
     */
    public function deleted(Mnpt $modeloxx)
    {
        HMnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mnpt "restored" event.
     *
     * @param  \App\Models\Mnptntos\Unidad\Mnpt  $modeloxx
     * @return void
     */
    public function restored(Mnpt $modeloxx)
    {
        HMnpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Mnpt "force deleted" event.
     *
     * @param  \App\Models\Mnptntos\Unidad\Mnpt  $modeloxx
     * @return void
     */
    public function forceDeleted(Mnpt $modeloxx)
    {
        HMnpt::create($this->getLog($modeloxx));
    }
}
