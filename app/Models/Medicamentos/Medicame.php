<?php

namespace App\Models\Medicamentos;

use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Medicame extends Model {

  protected $fillable = [
      'nombgene',
      'concentr',
      'unidconc',
      'unidmedi',
      'casa_id',
      'sis_clinica_id',
      'sis_esta_id',
      'user_crea_id',
      'user_edita_id',
  ];

  public static function combo($casa, $medicame) {
    $medic = '';
    $lista = ['' => 'Seleccione'];
    if (count($medicame) > 0) {
      $medic = Medicame::whereIn('id', $medicame)->get();
    } else {
      $medic = Medicame::where(['casa_id' => $casa])->get();
    }
    foreach ($medic as $key => $value) {
      $lista[$value->id] = $value->nombregen;
    }
    return $lista;
  }

  public static function combomarca() {
    $lista = ['' => 'Seleccione'];
    $medic = Medicame::select('medicames.id', 'medicames.nombgene', 'npts.nombre')
            ->join('mnpts', 'medicames.id', '=', 'mnpts.medicame_id')
            ->join('urangnpts', 'mnpts.urangnpt_id', '=', 'urangnpts.id')
            ->join('npts', 'urangnpts.npt_id', '=', 'npts.id')
            ->where('mnpts.estado_id', 1)
            ->where('medicames.estado_id', 1)
            ->get();
    foreach ($medic as $key => $value) {
      $lista[$value->id] = $value->nombgene . ' (' . $value->nombre . ')';
    }
    return $lista;
  }



  public function estado() {
    return $this->belongsTo(SisEsta::class);
  }

//   public function npts() {
//     return $this->belongsToMany(Npt::class);
//   }

  public function mmarcas() {
    return $this->hasMany(Mmarca::class);
  }

  public function casa() {
    return $this->belongsTo(Casa::class);
  }
  public function clinica() {
    return $this->belongsTo(SisClinica::class);
  }
  public function casas() {
    return $this->belongsToMany(Casa::class);
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      $dataxxxx['nombgene'] = strtoupper($dataxxxx['nombgene']);
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Medicame::create($dataxxxx);
      }
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
