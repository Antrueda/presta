<?php

namespace App\Observers\Medicame\Unidades;

use App\Models\Medicamentos\Unidad\Logs\HRangonpt;
use App\Models\Medicamentos\Unidad\Rangonpt;
use Illuminate\Support\Facades\Auth;

class RangonptObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['randesde'] = $modeloxx->randesde;
        $log['ranhasta'] = $modeloxx->ranhasta;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Rangonpt $modeloxx)
    {
        HRangonpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the rangonpt "updated" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rangonpt  $modeloxx
     * @return void
     */
    public function updated(Rangonpt $modeloxx)
    {
        HRangonpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the rangonpt "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rangonpt  $modeloxx
     * @return void
     */
    public function deleted(Rangonpt $modeloxx)
    {
        HRangonpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the rangonpt "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rangonpt  $modeloxx
     * @return void
     */
    public function restored(Rangonpt $modeloxx)
    {
        HRangonpt::create($this->getLog($modeloxx));
    }

    /**
     * Handle the rangonpt "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Rangonpt  $modeloxx
     * @return void
     */
    public function forceDeleted(Rangonpt $modeloxx)
    {
        HRangonpt::create($this->getLog($modeloxx));
    }
}
