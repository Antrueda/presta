<?php

namespace App\Models\Dispositivos;

use App\Models\Produccion\Calistam;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dlote extends Model {
   protected $fillable = [
      'fechvenc','dmarca_id','inventar','lotexxxx', 'sis_esta_id','user_crea_id','user_edita_id'
  ];
   public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }
  public function dmarca(){
    return $this->belongsTo(Dmarca::class);
  }

public function calistams()
{
    $this->morphMany(Calistam::class,'calistamgable');
}
  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Dlote::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
