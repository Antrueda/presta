<?php

namespace App\Observers\Usuarios;

use App\Models\Logs\HUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['name'] = $modeloxx->name;
        $log['email'] = $modeloxx->email;
        $log['documento'] = $modeloxx->documento;
        $log['telefono'] = $modeloxx->telefono;
        $log['password'] = $modeloxx->password;
        $log['sis_clinica_id'] = $modeloxx->sis_clinica_id;
        $log['polidato_at'] = $modeloxx->polidato_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['sis_esta_id'] = $modeloxx->sis_esta_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['metodoxx'] = request()->method();
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
         } 
    
    public function created(User $modeloxx)
    {
        HUser::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(User $modeloxx)
    {
        HUser::create($this->getLog($modeloxx));
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\User  $modeloxx
     * @return void
     */
    public function deleted(User $modeloxx)
    {
        HUser::create($this->getLog($modeloxx));
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\User  $modeloxx
     * @return void
     */
    public function restored(User $modeloxx)
    {
        HUser::create($this->getLog($modeloxx));
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\User  $modeloxx
     * @return void
     */
    public function forceDeleted(User $modeloxx)
    {
        HUser::create($this->getLog($modeloxx));
    }
}
