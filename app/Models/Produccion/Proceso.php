<?php

namespace App\Models\Produccion;

use App\Models\Formulaciones\Cformula;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Proceso extends Model
{

  protected $fillable = [
    'coloraci',
    'ausepart',
    'ausefuga',
    'ausemise',
    'sis_esta_id',
    'user_crea_id',
    'user_edita_id',
    'nopasaxx',
    'listermi',

  ];

  public static function comboterminado()
  {
    $lista = ['' => 'Seleccione'];
    foreach (Proceso::where('estaproc', 1)->where('nopasaxx', 1)->where('listermi', 0)->where('created_at', 'like', date('Y-m-d', time()) . '%')->get() as $value) {
      $lista[$value->id] = 'Lote:' . $value->formulacione_id . ' Proceso: ' . $value->id;
    }
    return $lista;
  }
  public function sis_esta()
  {
    return $this->belongsTo(SisEsta::class);
  }
  public function cformula()
  {
    return $this->hasOne(Cformula::class);
  }

  public function terminados()
  {
    return $this->hasMany(Terminado::class);
  }


  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $nopasaxx = 1;
      if ($dataxxxx['coloraci'] == 2 || $dataxxxx['ausepart'] == 2 || $dataxxxx['ausefuga'] == 2 || $dataxxxx['ausemise'] == 2) {
        $nopasaxx = 0;
      }
      $dataxxxx['nopasaxx'] = $nopasaxx;
      $dataxxxx['user_edita_id'] = Auth::user()->id;

      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Proceso::create($dataxxxx);
      }

      $cformula = Cformula::find($dataxxxx['cformula_id']);
      $cformula->update(['proceso_id' => $objetoxx->id, 'user_edita_id' => Auth::user()->id]);
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
