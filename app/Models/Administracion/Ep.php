<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ep extends Model {

  protected $fillable = [
       'nombre', 'sis_esta_id','user_crea_id','user_edita_id'
  ];

  

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Ep::create($dataxxxx);
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
      $activida = Ep::get();
      foreach ($activida as $registro) {
          if ($dataxxxx['ajaxxxxx']) {
              $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->nombre];
          } else {
              $comboxxx[$registro->id] = $registro->nombre;
          }
      }
      return $comboxxx;
  }
}
