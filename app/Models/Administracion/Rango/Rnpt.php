<?php

namespace App\Models\Administracion\Rango;

use App\Models\Administracion\Rango;
use App\Models\Medicamentos\Npt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Rnpt extends Model
{
    protected $fillable = [
        'rango_id',
        'npt_id',
        'sis_esta_id',  'user_crea_id', 'user_edita_id'
    ];

    public function rango()
    {
        return $this->belongsTo(Rango::class);
    }

    public function npt()
    {
        return $this->belongsTo(Npt::class);
    }
    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Rnpt::create($dataxxxx);
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
        $activida = Rnpt::
        where('rango_id',$dataxxxx['padrexxx'])->get();
        foreach ($activida as $registro) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->npt->nombre];
            } else {
                $comboxxx[$registro->id] = $registro->npt->nombre;
            }
        }

        return $comboxxx;
    }
}
