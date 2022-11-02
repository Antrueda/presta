<?php

namespace App\Models\Dispositivos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dmedico extends Model {

  protected $fillable = [
      'nombrexx',
      'sis_esta_id',
      'user_crea_id',
      'user_edita_id'
  ];

  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }

  public static function comboinvima() {
    $lista = ['' => 'Seleccione'];
    $medic = Dmedico::all();
    foreach ($medic as $key => $value) {
      $lista[$value->id] = $value->nombrexx;
    }
    return $lista;
  }
  public function marcas() {
    return $this->hasMany(Dmarca::class);
  }
  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      $dataxxxx['nombrexx'] = strtoupper($dataxxxx['nombrexx']);
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Dmedico::create($dataxxxx);
      }
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
