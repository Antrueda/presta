<?php

namespace App;

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

class User extends Authenticatable
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
        'user_crea_id', 'user_edita_id', 'sis_esta_id', 'sis_clinica_id', 'polidato_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $attributes = ['sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1];
    public function creador()
    {
        return $this->belongsTo(User::class, 'user_crea_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'user_edita_id');
    }

    public function sis_esta()
    {
        return $this->belongsTo(SisEsta::class, 'user_edita_id');
    }
    public function sis_clinica()
    {
        return $this->belongsTo(SisClinica::class);
    }
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = User::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RestablecerContrasenia($token));
    }


    public static function getCombo($dataxxxx)
    {
        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['esajaxxx']) {
                $comboxxx = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $dependen = User::select(['id', 'name'])
            ->get();

        foreach ($dependen as $areasxxx) {
            if ($dataxxxx['esajaxxx']) {
                $comboxxx[] = ['valuexxx' => $areasxxx->id, 'optionxx' => $areasxxx->name];
            } else {
                $comboxxx[$areasxxx->id] = $areasxxx->name;
            }
        }
        return $comboxxx;
    }
}
