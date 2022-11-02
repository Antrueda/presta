<?php

namespace App\Observers\Formulaciones;


use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Logs\HCformula;
use Illuminate\Support\Facades\Auth;

class CformulaObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['paciente_id'] = $modeloxx->paciente_id;
        $log['sis_clinica_id'] = $modeloxx->sis_clinica_id;
        $log['proceso_id'] = $modeloxx->proceso_id;
        $log['terminado_id'] = $modeloxx->terminado_id;
        $log['tiempo'] = $modeloxx->tiempo;
        $log['volumen'] = $modeloxx->volumen;
        $log['velocidad'] = $modeloxx->velocidad;
        $log['purga'] = $modeloxx->purga;
        $log['total'] = $modeloxx->total;
        $log['peso'] = $modeloxx->peso;
        $log['userevis_id'] = $modeloxx->userevis_id;
        $log['userprep_id'] = $modeloxx->userprep_id;
        $log['carbvali'] = $modeloxx->carbvali;
        $log['concarbo'] = $modeloxx->concarbo;
        $log['concprov'] = $modeloxx->concprov;
        $log['concprot'] = $modeloxx->concprot;
        $log['conclipv'] = $modeloxx->conclipv;
        $log['conclipi'] = $modeloxx->conclipi;
        $log['osmolari'] = $modeloxx->osmolari;
        $log['osmolarv'] = $modeloxx->osmolarv;
        $log['gramtota'] = $modeloxx->gramtota;
        $log['protnitr'] = $modeloxx->protnitr;
        $log['proteica'] = $modeloxx->proteica;
        $log['caloprov'] = $modeloxx->caloprov;
        $log['caloprot'] = $modeloxx->caloprot;
        $log['calolipv'] = $modeloxx->calolipv;
        $log['calolipi'] = $modeloxx->calolipi;
        $log['calocarv'] = $modeloxx->calocarv;
        $log['calocarb'] = $modeloxx->calocarb;
        $log['caloprot'] = $modeloxx->caloprot;
        $log['calototv'] = $modeloxx->calototv;
        $log['calotota'] = $modeloxx->calotota;
        $log['caltotkg'] = $modeloxx->caltotkg;
        $log['calcfosf'] = $modeloxx->calcfosf;
        $log['calcfosv'] = $modeloxx->calcfosv;
        $log['pesoteor'] = $modeloxx->pesoteor;
        $log['orden_id'] = $modeloxx->orden_id;
        $log['crango_id'] = $modeloxx->crango_id;
        $log['terminado_id'] = $modeloxx->terminado_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         }

    public function created(Cformula $modeloxx)
    {
        HCformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Cformula $modeloxx)
    {
        HCformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Cformula "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Cformula  $modeloxx
     * @return void
     */
    public function deleted(Cformula $modeloxx)
    {
        HCformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Cformula "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Cformula  $modeloxx
     * @return void
     */
    public function restored(Cformula $modeloxx)
    {
        HCformula::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Cformula "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Cformula  $modeloxx
     * @return void
     */
    public function forceDeleted(Cformula $modeloxx)
    {
        HCformula::create($this->getLog($modeloxx));
    }
}
