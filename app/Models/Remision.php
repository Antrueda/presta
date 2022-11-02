<?php

namespace App\Models;

use App\Models\Clinica\Clinica;
use App\Models\Reportes\Orden;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Remision extends Model {

  protected $fillable = [
      'orden_id', 'clinica_id','quimfarm_id', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
  ];
  public function quimfarm()
  {
      return $this->belongsTo(User::class, 'quimfarm_id');
  }
  public function creador()
  {
      return $this->belongsTo(User::class, 'user_crea_id');
  }
  public function editor()
  {
      return $this->belongsTo(User::class, 'user_edita_id');
  }
  public function sis_esta()
  {
      return $this->belongsTo(SisEsta::class);
  }
  public function clinica()
  {
      return $this->belongsTo(Clinica::class);
  }
  public function orden()
  {
      return $this->belongsTo(Orden::class);
  }
  public static function transaccion($dataxxxx)
  {
      $objetoxx = DB::transaction(function () use ($dataxxxx) {

          $dataxxxx['requestx']->request->add(['user_edita_id' => Auth::user()->id]);
          if ($dataxxxx['modeloxx'] != '') {
              $dataxxxx['modeloxx']->update($dataxxxx['requestx']->all());
          } else {
              $dataxxxx['requestx']->request->add(['user_crea_id' => Auth::user()->id]);
              $dataxxxx['modeloxx'] = Remision::create($dataxxxx['requestx']->all());
          }
          return $dataxxxx['modeloxx'];
      }, 5);
      return $objetoxx;
  }

}
