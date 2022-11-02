<?php

namespace App\Models\Logs;

use App\Models\Clinica\Clinica;
use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;
use App\Notifications\RestablecerContrasenia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class HUser extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'documento', 'telefono', 'password',
        'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx', 'sis_clinica_id', 'polidato_at'
    ];

  
}
