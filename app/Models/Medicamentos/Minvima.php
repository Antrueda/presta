<?php

namespace App\Models\Medicamentos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Minvima extends Model
{

  protected $fillable = [
    'reginvim', 'mmarca_id', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
  ];

  public static function combo($dataxxxx)
  {
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['esajaxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
   
      $entidadx = Minvima::select(['minvimas.id','minvimas.reginvim','mmarcas.marcaxxx'])
      ->join('mmarcas', 'minvimas.mmarca_id', '=', 'mmarcas.id')
        ->where('minvimas.mmarca_id', $dataxxxx['padrexxx'])
        ->where('mmarcas.sis_esta_id', 1)
        ->where('minvimas.sis_esta_id', 1)
        ->get();
      foreach ($entidadx as $entisalu) {
        if ($dataxxxx['esajaxxx']) {
          $comboxxx[] = ['valuexxx' => $entisalu->id, 'optionxx' => $entisalu->reginvim . ' (' . $entisalu->marcaxxx . ')'];
        } else {
          $comboxxx[$entisalu->id] = $entisalu->reginvim . ' (' . $entisalu->marcaxxx . ')';
        }
      }
    
    return $comboxxx;
  }

  public function mmarca()
  {
    return $this->belongsTo(Mmarca::class);
  }

  public function sis_esta()
  {
    return $this->belongsTo(SisEsta::class);
  }

  public function mlotes()
  {
    return $this->hasMany(Mlote::class);
  }
  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Minvima::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
