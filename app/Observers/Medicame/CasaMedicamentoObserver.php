<?php

namespace App\Observers\Medicame;

use App\Models\Medicamentos\CasaMedicamento;
use App\Models\Medicamentos\Logs\HCasaMedicamento;
use Illuminate\Support\Facades\Auth;

class CasaMedicamentoObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['medicamento_id'] = $modeloxx->medicamento_id;
        $log['casa_id'] = $modeloxx->casa_id;
        $log['estadoxx'] = $modeloxx->estadoxx;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(CasaMedicamento $modeloxx)
    {
        HCasaMedicamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(CasaMedicamento $modeloxx)
    {
        HCasaMedicamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the CasaMedicamento "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\CasaMedicamento  $modeloxx
     * @return void
     */
    public function deleted(CasaMedicamento $modeloxx)
    {
        HCasaMedicamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the CasaMedicamento "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\CasaMedicamento  $modeloxx
     * @return void
     */
    public function restored(CasaMedicamento $modeloxx)
    {
        HCasaMedicamento::create($this->getLog($modeloxx));
    }

    /**
     * Handle the CasaMedicamento "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\CasaMedicamento  $modeloxx
     * @return void
     */
    public function forceDeleted(CasaMedicamento $modeloxx)
    {
        HCasaMedicamento::create($this->getLog($modeloxx));
    }
}
