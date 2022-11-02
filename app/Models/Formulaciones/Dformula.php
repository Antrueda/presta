<?php

namespace App\Models\Formulaciones;

use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Mlote;
use App\Models\Produccion\ProPreplibe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dformula extends Model
{

  protected $fillable = [
    'cformula_id',
    'medicame_id',
    'preparar',
    'cantidad',
    'rtotal',
    'volumen',
    'purga',
    'user_crea_id',
    'user_edita_id',
    'sis_esta_id'
  ];

  public static function combo($medicamento)
  {
    $lista = [];
    $medic = Dformula::whereIn('idformulacion', $medicamento)->get();
    foreach ($medic as $key => $value) {
      $lista[] = [
        'medicamento' => $value->medicamento,
        'cantidad' => $value->cantidad,
        'volumen' => $value->volumen,
      ];
    }
    return $lista;
  }
  public function medicame()
  {
    return $this->belongsTo(Medicame::class);
  }
  public function cformula()
  {
    return $this->belongsTo(Cformula::class);
  }
  public function dfmlotes()
  {
    return $this->hasMany(Dfmlote::class);
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $totalxxx = 0;

      foreach ($dataxxxx as $key => $value) {
        $data = explode('_', $key);
        if (isset($data[1]) && $data[1] == 'volu') {
          $totalxxx +=  $dataxxxx[$key];
        }
      }

      $dataxxxx['user_edita_id'] = Auth::user()->id;

      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['sis_esta_id'] = 1;
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Cformula::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }

  public static function getTransaccionPreparacion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
        $quimfarm = ProPreplibe::orderBy('created_at', 'desc')
        ->with([
            'userprep' => function ($queryxxx) {
                $queryxxx->select(['id']);
            }
        ])
        ->first();
      $objetoxx->dformulas()->update(['preparar' => 1, 'user_edita_id' => Auth::user()->id]);
      $objetoxx->update(['userprep_id' => $quimfarm->userprep->id, 'user_edita_id' => Auth::user()->id]);
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
