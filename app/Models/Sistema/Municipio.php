<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model {

  protected $fillable = [
      'nombre',
      'estado_id'];

  public static function combowhere($id) {
    $lista = [['id' => '', 'nombre' => 'Seleccione']];
    foreach (Municipio::where('departamento_id', $id)->orderByRaw('nombre','ASC')->get() as $key => $value) {
      $lista[] = ['id' => $value->id, 'nombre' => $value->nombre];
    }
    return $lista;
  }

  public function departamento() {
    return $this->belongsTo(Departamento::class);
  }

  public static function combo($dataxxxx)
  {
    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }

    $activida = Municipio::where('departamento_id',$dataxxxx['departam'])->get();

    foreach ($activida as $registro) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->nombre];
      } else {
        $comboxxx[$registro->id] = $registro->nombre;
      }
    }

    return $comboxxx;
  }

}
