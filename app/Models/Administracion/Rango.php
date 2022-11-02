<?php

namespace App\Models\Administracion;

use App\Models\Clinica\Crango;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Rango extends Model
{

  protected $fillable = [
    'ranginic',
    'rangfina',
    'sis_esta_id',
    'user_crea_id',
    'user_edita_id'
  ];

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
        $objetoxx = Rango::create($dataxxxx);
      }
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
  public static function combo($dataxxxx)
  {

    /**
     * buscar los rangos que no se han asignado, por cada rango se debe tener encuenta1 que solo se quita de la
     * lista si ya tiene todas las condicones.
     * en caso de que ya cumpla la condicion anterior solo mostrarlo cuando se este editando
     */


    /**
     * encontrar los rangos que no han sido asignados a la clinica
     */
    $notinran = [];
    $condicio = Crango::where('sis_clinica_id', $dataxxxx['clinicax'])
      ->groupBy('rango_id')
      ->get();
    //echo $dataxxxx['crangoxx'];
    // ojo por cada rango buscar si ya tiene condicines asignadas
    foreach ($condicio as $condicix) {
      $dataxxxx['rango_id'] = $condicix->rango_id;
      $condiciy = Condicio::getVerificarExistencia($dataxxxx);

      if ($condiciy) { // ya tiene todas las condiciones
        // echo 'dd';
        //echo $dataxxxx['crangoxx'].' => '.$condicix->rango_id.'<br>';
        if ($dataxxxx['crangoxx'] != $condicix->rango_id) { // se excluye el que seleccino
          $notinran[] = $condicix->rango_id;
          //echo 'jdjdj';
        }

        //echo $dataxxxx['crangoxx'];
      }
    }


    /**
     * econtrar las condiciones faltantes
     */


    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['esajaxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    $entidadx = Rango::whereNotIn('id', $notinran)->get();
    foreach ($entidadx as $entisalu) {
      if ($dataxxxx['esajaxxx']) {
        $comboxxx[] = ['valuexxx' => $entisalu->id, 'optionxx' => $entisalu->ranginic . ' - ' . $entisalu->rangfina];
      } else {
        $comboxxx[$entisalu->id] = $entisalu->ranginic . ' - ' . $entisalu->rangfina;
      }
    }
    return $comboxxx;
  }
  public static function getRango($dataxxxx)
  {
    $rangoxxx = Rango::find($dataxxxx['padrexxx']);
    return 'RANGO: ' . $rangoxxx->ranginic . ' - ' . $rangoxxx->rangfina;
  }
}
