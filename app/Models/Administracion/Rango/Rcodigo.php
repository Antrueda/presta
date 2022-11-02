<?php

namespace App\Models\Administracion\Rango;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Rcodigo extends Model
{
    protected $fillable = [
        'rcondici_id',
        'codiprod',
       // 'descripc',
        'sis_esta_id',  'user_crea_id', 'user_edita_id'
    ];

    public function rcondici()
    {
        return $this->belongsTo(Rcondici::class);
    }

    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Rcodigo::create($dataxxxx);
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
        $activida = Rcodigo::get();
        foreach ($activida as $registro) {
            $rangoxxx = $registro->rcondici->rnpt->rango;


            $optionxx = $registro->codiprod .
                ' (' . $rangoxxx->ranginic . ' - ' .
                $rangoxxx->rangfina . ' ' .
                $registro->rcondici->rnpt->npt->nombre . ' ' .
                $registro->rcondici->condicio->condicio . ')';





            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $optionxx];
            } else {
                $comboxxx[$registro->id] = $optionxx;
            }
        }

        return $comboxxx;
    }
}
