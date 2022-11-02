<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\Logs\HMedicameSisClinica;
use App\Models\Medicamentos\MedicameSisClinica;
use Illuminate\Support\Facades\Auth;

class MedicameSisClinicaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['medicame_id'] = $modeloxx->medicame_id;
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
    
    public function created(MedicameSisClinica $modeloxx)
    {
        HMedicameSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(MedicameSisClinica $modeloxx)
    {
        HMedicameSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the MedicameSisClinica "deleted" event.
     *
     * @param  \App\Models\MedicameSisClinicantos\Unidad\MedicameSisClinica  $modeloxx
     * @return void
     */
    public function deleted(MedicameSisClinica $modeloxx)
    {
        HMedicameSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the MedicameSisClinica "restored" event.
     *
     * @param  \App\Models\MedicameSisClinicantos\Unidad\MedicameSisClinica  $modeloxx
     * @return void
     */
    public function restored(MedicameSisClinica $modeloxx)
    {
        HMedicameSisClinica::create($this->getLog($modeloxx));
    }

    /**
     * Handle the MedicameSisClinica "force deleted" event.
     *
     * @param  \App\Models\MedicameSisClinicantos\Unidad\MedicameSisClinica  $modeloxx
     * @return void
     */
    public function forceDeleted(MedicameSisClinica $modeloxx)
    {
        HMedicameSisClinica::create($this->getLog($modeloxx));
    }
}
