<?php

namespace App\Observers\Administracion;

use App\Models\Administracion\Genero;
use App\Models\Administracion\Logs\HGenero;
use Illuminate\Support\Facades\Auth;

class GeneroObserver 
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id'] = $modeloxx->id;
        $log['nombre'] = $modeloxx->nombre;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();

        return $log;
    } 
    
    public function created(Genero $modeloxx)
    {
        HGenero::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Genero "updated" event.
     *
     * @param  \App\Models\Administracion\Genero  $modeloxx
     * @return void
     */
    public function updated(Genero $modeloxx)
    {
        HGenero::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Genero "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Genero  $modeloxx
     * @return void
     */
    public function deleted(Genero $modeloxx)
    {
        HGenero::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Genero "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Genero  $modeloxx
     * @return void
     */
    public function restored(Genero $modeloxx)
    {
        HGenero::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Genero "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Genero  $modeloxx
     * @return void
     */
    public function forceDeleted(Genero $modeloxx)
    {
        HGenero::create($this->getLog($modeloxx));
    }
}
