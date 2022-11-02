<?php

namespace App\Models\Administracion;

use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Servicio extends Model {

  protected $fillable = [
      'servicio', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
  ];

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
      $activida = Servicio::
      get();
      foreach ($activida as $registro) {
          if ($dataxxxx['ajaxxxxx']) {
              $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->servicio];
          } else {
              $comboxxx[$registro->id] = $registro->servicio;
          }
      }
     
      return $comboxxx;
  }

  public function clinica() {
    return $this->belongsTo(SisClinica::class);
  }

  public function estado() {
    return $this->belongsTo(SisEsta::class);
  }


  public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Servicio::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
