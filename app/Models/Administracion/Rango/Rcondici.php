<?php

namespace App\Models\Administracion\Rango;

use App\Models\Administracion\Condicio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Rcondici extends Model
{
    protected $fillable = [
        'rnpt_id',
        'condicio_id',
        'sis_esta_id',  'user_crea_id', 'user_edita_id'
    ];

    public function rnpt()
    {
        return $this->belongsTo(Rnpt::class);
    }
    public function condicio()
    {
        return $this->belongsTo(Condicio::class);
    }

    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Rcondici::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }

    public static function combo($dataxxxx)
    {
        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = Rcondici::
        join('rnpts','rcondicis.rnpt_id','=','rnpts.id')
        ->where('rnpts.rango_id',$dataxxxx['padrexxx'])->get();
        foreach ($activida as $registro) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->condicio->condicio];
            } else {
                $comboxxx[$registro->id] = $registro->condicio->condicio;
            }
        }
        return $comboxxx;
    }
    public static function getCombo($dataxxxx)
    {
        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = Rcondici::get();
        foreach ($activida as $registro) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->condicio->condicio];
            } else {
                $comboxxx[$registro->id] = $registro->condicio->condicio;
            }
        }
        return $comboxxx;
    }
}
