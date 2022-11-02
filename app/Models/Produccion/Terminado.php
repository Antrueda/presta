<?php

namespace App\Models\Produccion;

use App\Models\Formulaciones\Cformula;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Terminado extends Model
{

  protected $fillable = [
    'completo',
    'particul',
    'integrid',
    'contenid',
    'fugasxxx',
    'miscelas',
    'burbujas',
    'document',
    'teorico_',
    'realxxx_',
    'pesobols',
    'limitesx',
    'concepto',
    'user_crea_id',
    'user_edita_id',
    'estaterm',
    'nopasaxx',
    'sis_esta_id'
  ];

  public function cformula()
  {
    return $this->hasOne(Cformula::class);
  }

  public function sis_esta()
  {
    return $this->belongsTo(SisEsta::class);
  }

  public static function getProcesos($dataxxxx)
  {
    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    /**
     * hallar las formulaciones que ya se le hicieron control de proceso
     */
    $procesos = Proceso::where('created_at', 'like', date('Y-m-d', time()) . "%")->get();
    $notinxxx = [];
    foreach ($procesos as $procesox) {
      if (!in_array($procesox->cformula_id, $notinxxx)) {
        $notinxxx[] = $procesox->cformula_id;
      }
    }

    /**
     * hallar formulaciones que no se le han hecho contro de proceso
     */

    Proceso::where('estaproc', 1)
      ->where('nopasaxx', 1)
      ->where('listermi', 0)
      ->where('created_at', 'like', date('Y-m-d', time()) . '%')->get();


    $activida = Proceso::where(function ($queryxxx) {
      $queryxxx->where('nopasaxx',  1);
      $queryxxx->where('listermi',  0);
      $queryxxx->where('created_at', 'like', date('Y-m-d', time()) . "%");
      return $queryxxx;
    })
      ->get();
    foreach ($activida as $registro) {
      if (!in_array($registro->id, $notinxxx)) {
        if ($dataxxxx['ajaxxxxx']) {
          $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => 'Proceso: ' . $registro->id];
        } else {
          $comboxxx[$registro->id] = 'Proceso: ' . $registro->id;
        }
      }
    }
    if ($dataxxxx['isupdate'] > 0) {
      $registro = Proceso::where('id', $dataxxxx['isupdate'])->first();
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => 'Proceso: ' . $registro->id];
      } else {
        $comboxxx[$registro->id] = 'Proceso: ' . $registro->id;
      }
    } else {
      /**
       * no hay preparaciones
       */
      if (count($comboxxx) == 1) {
        if ($dataxxxx['ajaxxxxx']) {
          $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'No hay procesos en este momento, vuelva a intentar más tarde'];
        } else {
          $comboxxx = ['' => 'No hay procesos en este momento, vuelva a intentar más tarde'];
        }
      }
    }
    return $comboxxx;
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $nopasaxx = 1;
      foreach ($dataxxxx as $key => $radiosxx) {
        $radioxxx = explode('_', $key);
        if (!isset($radioxxx[1]) && $radiosxx == 2) {
          $nopasaxx = 0;
        }
      }

      $dataxxxx['nopasaxx'] = $nopasaxx;
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Terminado::create($dataxxxx);
      }
      $cformula=Cformula::find($dataxxxx['cformula_id']);
      $cformula->update(['terminado_id'=>$objetoxx->id,'user_edita_id' => Auth::user()->id]);
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
