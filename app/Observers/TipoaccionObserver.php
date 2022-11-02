<?php

namespace App\Observers;

use App\Models\Tipoaccion;
use App\Models\Logs\HTipoaccion;
use Illuminate\Support\Facades\Auth;

class TipoaccionObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['tituloxx'] = $modeloxx->tituloxx;
        $log['permisox'] = $modeloxx->permisox;
        $log['iconoxxx'] = $modeloxx->iconoxxx;
        $log['pestania'] = $modeloxx->pestania;
        $log['routexxx'] = $modeloxx->routexxx;
        $log['titulink'] = $modeloxx->titulink;
        $log['cuerpoxx'] = $modeloxx->cuerpoxx;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Tipoaccion $modeloxx)
    {
        HTipoaccion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Tipoaccion "updated" event.
     *
     * @param  \App\Models\Administracion\Tipoaccion  $modeloxx
     * @return void
     */
    public function updated(Tipoaccion $modeloxx)
    {
        HTipoaccion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Tipoaccion "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Tipoaccion  $modeloxx
     * @return void
     */
    public function deleted(Tipoaccion $modeloxx)
    {
        HTipoaccion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Tipoaccion "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Tipoaccion  $modeloxx
     * @return void
     */
    public function restored(Tipoaccion $modeloxx)
    {
        HTipoaccion::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Tipoaccion "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Tipoaccion  $modeloxx
     * @return void
     */
    public function forceDeleted(Tipoaccion $modeloxx)
    {
        HTipoaccion::create($this->getLog($modeloxx));
    }
}
