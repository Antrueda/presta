<?php

namespace App\Models\Medicamentos;

use App\Models\Formulaciones\Dfmlote;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mlote extends Model {
  protected $fillable = [
      'fechvenc', 'minvima_id', 'inventar', 'lotexxxx', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
  ];
  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }
  public function minvima() {
    return $this->belongsTo(Minvima::class);
  }

  /*
   * utilizado para descontar el inventario de la formulación
   * 
   */

  public function Dfmlotes() {
    return $this->hasMany(Dfmlote::class);
  }

  public static function consultarinventario($formmedi) {
    $mlotexxx = Medicame::select('mlotes.id', 'mlotes.inventar')
                    ->join('mmarcas', 'medicamentos.id', 'mmarcas.medicamento_id')
                    ->join('minvimas', 'mmarcas.id', 'minvimas.mmarca_id')
                    ->join('mlotes', 'minvimas.id', 'mlotes.minvima_id')
                    ->where('medicamentos.id', $formmedi->medicamento_id)
                    ->where('mlotes.inventar', '>', 0)
                    ->where('mlotes.estado_id', 1)
                    ->orderBy('mlotes.fechvenc', 'asc')->get();
    return $mlotexxx;
  }

  public function inactivarvencidos() {
    $fechahoy = date('Y-m-d', time());
    foreach (Mlote::where('estado_id', 1)->get() as $value) {
      if ($fechahoy >= $value->fechvenc) {
        $value->update(['estado_id' => 2]);
      }
    }
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Mlote::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }
  

}
