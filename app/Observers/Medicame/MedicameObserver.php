<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Logs\HMedicame;
use Illuminate\Support\Facades\Auth;

class MedicameObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['nombgene'] = $modeloxx->nombgene;
        $log['concentr'] = $modeloxx->concentr;
        $log['unidconc'] = $modeloxx->unidconc;
        $log['unidmedi'] = $modeloxx->unidmedi;
        $log['casa_id'] = $modeloxx->casa_id;
        $log['sis_clinica_id'] = $modeloxx->sis_clinica_id;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(Medicame $modeloxx)
    {
        HMedicame::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Medicame $modeloxx)
    {
        HMedicame::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Medicame "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Medicame  $modeloxx
     * @return void
     */
    public function deleted(Medicame $modeloxx)
    {
        HMedicame::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Medicame "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Medicame  $modeloxx
     * @return void
     */
    public function restored(Medicame $modeloxx)
    {
        HMedicame::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Medicame "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Medicame  $modeloxx
     * @return void
     */
    public function forceDeleted(Medicame $modeloxx)
    {
        HMedicame::create($this->getLog($modeloxx));
    }
}
