<?php

namespace App\Models\Medicamentos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mmarca extends Model {

  protected $fillable = [
      'nombcome', 'osmorali', 'pesoespe', 'formfarm', 'sis_esta_id', 'marcaxxx', 'medicame_id','user_crea_id','user_edita_id'
  ];


  public function medicame() {
    return $this->belongsTo(Medicame::class);
  }

  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }

  public function minvimas() {
    return $this->hasMany(Minvima::class);
  }

  public static function verificarinventario($medicame) {
    $error = '';
    if ($medicame == 17) {
      $error = '';
    }
    return Mmarca::join('minvimas', 'mmarcas.id' . $error, 'minvimas.mmarca_id')
                    ->join('mlotes', 'minvimas.id', 'mlotes.minvima_id')
                    ->where('mmarcas.medicame_id', $medicame)
                    ->where('mlotes.sis_esta_id', 1)
                    ->get();
  }


  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      $dataxxxx['marcaxxx'] = strtoupper($dataxxxx['marcaxxx']);
      $dataxxxx['nombcome'] = strtoupper($dataxxxx['nombcome']);
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Mmarca::create($dataxxxx);
      }
      
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
  public static function combo($dataxxxx)
  {
      if($dataxxxx['cabecera']){
          if($dataxxxx['esajaxxx']){  
              $comboxxx[] = ['valuexxx'=>'','optionxx'=>'Seleccione'];
          }else{
              $comboxxx = [''=>'Seleccione'];
          }
          
      }   
      $entidadx=Mmarca::
      select(['mmarcas.id','mmarcas.nombcome','mmarcas.marcaxxx'])  
      ->where('medicame_id',$dataxxxx['medicame'])
      ->join('medicames','mmarcas.medicame_id','=','medicames.id')
      ->where('medicames.sis_esta_id',1)
      ->get();
      foreach ($entidadx as $entisalu) {
          if($dataxxxx['esajaxxx']){
              $comboxxx[] = ['valuexxx'=>$entisalu->id, 'optionxx'=>$entisalu->nombcome.' ('.$entisalu->marcaxxx.')'];
          }else{
              $comboxxx[$entisalu->id] = $entisalu->nombcome.' ('.$entisalu->marcaxxx.')';
          }
      }
      return $comboxxx;
  }

}
