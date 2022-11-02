<?php

namespace App\Models\Usuarios;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class Rol extends Role
{

    protected $fillable = [
        'name', 'user_edita_id', 'user_crea_id','guard_name'
    ];

    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $dataxxxx['name'] = strtoupper($dataxxxx['name']);
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Rol::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
