<?php

namespace App\Models\Medicamentos;

use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Casa extends Model
{

    protected $fillable = [
        'casa', 'sis_esta_id', 'ordecasa', 'nameidxx', 'unidmedi', 'user_edita_id', 'user_crea_id'
    ];

    public static function casascombo()
    {
        $lista = ['' => 'Seleccione'];
        foreach (Casa::where('sis_esta_id', 1)->get() as $key => $value) {
            $lista[$value->id] = $value->nombre;
        }
        return $lista;
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
        $activida = Casa::get();
        foreach ($activida as $registro) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->casa];
            } else {
                $comboxxx[$registro->id] = $registro->casa;
            }
        }
        return $comboxxx;
    }

    public function sis_esta()
    {
        return $this->belongsTo(SisEsta::class);
    }
    public function creador()
    {
        return $this->belongsTo(User::class,'user_crea_id');
    }
    public function editor()
    {
        return $this->belongsTo(User::class,'user_edita_id');
    }
    public function medicames()
    {
        return $this->hasMany(Medicame::class);
    }

    public static function orden($newoldxx)
    {
        $odencasa = [];
        if ($newoldxx) {
            $odencasa = ['SI' => 'POSICIÓN NUEVA'];
        }
        $totacasa = Casa::all();
        for ($key = 1; $key <= count($totacasa); $key++) {
            $odencasa[$key] = 'POSICIÓN ' . $key;
        }
        return $odencasa;
    }
    public static function asignaorden($ordecasa, $pcasaxxx, $newoldxx)
    {
        $casasxxx = Casa::all();
        foreach ($casasxxx as $value) {
            $casaxxxx = Casa::where('id', $value->id)->first();
            if ($newoldxx) { // se esta editando
                if ($pcasaxxx->ordecasa != $ordecasa) {
                    if ($pcasaxxx->ordecasa < $value->ordecasa && $value->ordecasa <= $ordecasa) { // pasar de una posicion menor a una mayor
                        $casaxxxx->update(['ordecasa' => $value->ordecasa - 1]);
                    } else if ($pcasaxxx->ordecasa > $value->ordecasa && $value->ordecasa >= $ordecasa) { // pasar de una posicion mayor a una menor

                        $casaxxxx->update(['ordecasa' => $value->ordecasa + 1]);
                    }
                }
            } else if ($value->ordecasa >= $ordecasa) { // es nuevo
                $casaxxxx->update(['ordecasa' => $value->ordecasa + 1]);
            }
        }
    }

    public static function transaccion($dataxxxx)
    {
        $modeloxx = DB::transaction(function () use ($dataxxxx) {
            $dataxxxx['requestx']->request->add(['user_edita_id' => Auth::user()->id]);

            $dataxxxx['requestx']->request->add(['casa' => strtoupper($dataxxxx['requestx']->casa)]);
            $maximoxx = Casa::max('ordecasa');

            if ($dataxxxx['modeloxx'] != '') {
                if ($dataxxxx['requestx']->ordecasa != 'SI') {
                    Casa::asignaorden($dataxxxx['requestx']->ordecasa,  $dataxxxx['modeloxx'], true);
                }
                $dataxxxx['modeloxx']->update($dataxxxx['requestx']->all());
            } else {
                if ($dataxxxx['requestx']->ordecasa == 'SI') {
                    $dataxxxx['requestx']->ordecasa = $maximoxx + 1;
                }
                Casa::asignaorden($dataxxxx['requestx']->ordecasa, '', false);
                $dataxxxx['requestx']->request->add(['user_crea_id' => Auth::user()->id]);
                $dataxxxx['modeloxx'] = Casa::create($dataxxxx['requestx']->all());
            }
            return $dataxxxx['modeloxx'];
        }, 5);
        return $modeloxx;
    }
}
