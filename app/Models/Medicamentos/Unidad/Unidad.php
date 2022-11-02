<?php

namespace App\Models\Medicamentos\Unidad;

use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Unidad extends Model
{
    protected $fillable = [
        's_unidad', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
    ];

    public function sis_esta()
    {
      return $this->belongsTo(SisEsta::class);
    }
    
    public function creador()
    {
      return $this->belongsTo(User::class, 'user_crea_id');
    }
  
    public function editor()
    {
      return $this->belongsTo(User::class, 'user_edita_id');
    }
    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Unidad::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }


    public static function combo($cabecera, $ajaxxxxx)
    {
        $comboxxx = [];
        if ($cabecera) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = Unidad::get();
        foreach ($activida as $registro) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->s_unidad];
            } else {
                $comboxxx[$registro->id] = $registro->s_unidad;
            }
        }
        return $comboxxx;
    }
}
