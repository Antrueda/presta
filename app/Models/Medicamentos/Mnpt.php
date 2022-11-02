<?php

namespace App\Models\Medicamentos;

use App\Models\Medicamentos\Unidad\Urangnpt;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mnpt extends  Model
{

  protected $fillable = [
    'medicame_id',
    'urangnpt_id',
    'sis_esta_id',
    'user_crea_id',
    'user_edita_id'
  ];

  public function medicame()
  {
    return $this->belongsTo(Medicame::class);
  }
  public function urangnpt()
  {
    return $this->belongsTo(Urangnpt::class);
  }
  public function sis_esta()
  {
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
        $objetoxx = Mnpt::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }


  public static function combo($dataxxxx)
  {
    $notinxxx = [];
    foreach (Mnpt::where("medicame_id", $dataxxxx["medicame"])->get() as $mnptxxxx) {
      if ($dataxxxx['selectxx'] != $mnptxxxx->urangnpt_id) {
        $notinxxx[] = $mnptxxxx->urangnpt_id;
      }
    };
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['esajaxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    $urangnpt = Urangnpt::whereNotIn("id", $notinxxx)
      ->get();
    foreach ($urangnpt as $registro) {
      $optionxx = $registro->unidrang;

      $optionxx = $registro->npt->nombre . " ({$optionxx->rangonpt->randesde} - {$optionxx->rangonpt->ranhasta} {$optionxx->unidad->s_unidad})";
      if ($dataxxxx['esajaxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $optionxx];
      } else {
        $comboxxx[$registro->id] = $optionxx;
      }
    }

    return $comboxxx;
  }
}
