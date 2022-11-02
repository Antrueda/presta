<?php

namespace App\Observers;

use App\Models\Itemordene;
use App\Models\Logs\HItemordene;
use Illuminate\Support\Facades\Auth;

class ItemordeneObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['itemxxxx'] = $modeloxx->itemxxxx;
        $log['rowspanx'] = $modeloxx->rowspanx;
        $log['colspanx'] = $modeloxx->colspanx;
        $log['campoxxx'] = $modeloxx->campoxxx;
        $log['aplicaxx'] = $modeloxx->aplicaxx;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(Itemordene $modeloxx)
    {
        HItemordene::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Itemordene "updated" event.
     *
     * @param  \App\Models\Administracion\Itemordene  $modeloxx
     * @return void
     */
    public function updated(Itemordene $modeloxx)
    {
        HItemordene::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Itemordene "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Itemordene  $modeloxx
     * @return void
     */
    public function deleted(Itemordene $modeloxx)
    {
        HItemordene::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Itemordene "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Itemordene  $modeloxx
     * @return void
     */
    public function restored(Itemordene $modeloxx)
    {
        HItemordene::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Itemordene "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Itemordene  $modeloxx
     * @return void
     */
    public function forceDeleted(Itemordene $modeloxx)
    {
        HItemordene::create($this->getLog($modeloxx));
    }
}
