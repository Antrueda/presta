<?php

namespace App\Traits\Produccion;

use App\Models\Formulaciones\Dfmlote;
use App\Models\Formulaciones\Dformula;
use App\Models\Formulaciones\Orden;
use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Mlote;
use Illuminate\Support\Facades\Auth;

trait InventarioTrait
{
  public function getInactivarMlostesvencidos()
  {
    $fechahoy = date('Y-m-d', time());
    foreach (Mlote::where('sis_esta_id', 1)->get() as $value) {
      if ($fechahoy >= $value->fechvenc) {
        $value->update(['sis_esta_id' => 2]);
      }
    }
  }
  /**
   * consultar los lotes disponibles del medicamento consultado que tengan inventario y que no esten vencidos
   * @param array $dataxxxx contiene todos los parametros que puede ser utilizados por el método
   */
  public function getConsultarInventario($dataxxxx)
  {
    $mlotexxx = Medicame::select('mlotes.id', 'mlotes.inventar')
      ->join('mmarcas', 'medicames.id', 'mmarcas.medicame_id')
      ->join('minvimas', 'mmarcas.id', 'minvimas.mmarca_id')
      ->join('mlotes', 'minvimas.id', 'mlotes.minvima_id')
      ->where('medicames.id', $dataxxxx['medicame'])
      ->where('mlotes.inventar', '>', 0)
      ->where('mlotes.sis_esta_id', 1)
      ->orderBy('mlotes.fechvenc', 'asc')->get();
    return $mlotexxx;
  }

  /**
   * Realizar las validaciones para el descuento de inventario.
   *
   * @param  $detallex registro que contiene el valor de la purga el cual se quiere completar el descuento
   * @param int $cantidad cantidad que se lleva acumulada para el descuento
   * @param $registro registro del lote al que se le va a descontar inventario
   * @return int $cantidad que se lleva de lo que se necesita para completar lo solicitado
   */
  public function getDescuento($detallex, $cantidad, $registro)
  {
    $inventar = 0;
    $volumenx = 0;
    /**
     * el lote cuenta con el total de lo requerido
     */
    if ($detallex->purga - $cantidad >= $registro->inventar) {
      $volumenx = $registro->inventar;
    } else { // descontar el requerimiento de varios lotes
      $inventar = $registro->inventar - ($detallex->purga - $cantidad); // descuenta a inventario lo que hace falta
      $volumenx = $registro->inventar - $inventar; // cantidad que se desconto a inventario
    }
    $mlotexxy = Mlote::find($registro->id); // seleccionar el lote al que se le va a descontar inventario
    /* realizar el descuento del inventario encontrado */
    $mlotexxy->update(['inventar' => $inventar, 'userupda' => auth()->user()->id]);
    /* insertar el volumen encontrado */
    if ($volumenx > 0) {
      $dataxxxx = [
        'dformula_id' => $detallex->id,
        'mlote_id' => $registro->id,
        'user_crea_id' => auth()->user()->id,
        'user_edita_id' => auth()->user()->id,
        'sis_esta_id' => 1,
        'volumenx' => $volumenx
      ];
      Dfmlote::create($dataxxxx);
    }

    return $cantidad + $volumenx;
  }

  /**
   * Este metodo realiza el descuento al inventario del valor solicitado por cada medicamento seleccionado
   *
   */
  public function getDescontarInventario($dataxxxx)
  {
    /**
     * recorrer todo los medicamentos que se formularon
     */

    foreach ($dataxxxx['cformula']->dformulas as $detallex) {
      // consultar el inventario del medicamento seleccionado
      $mlotexxx = $this->getConsultarInventario(['medicame' => $detallex->medicame_id]);
      // saber si ese detalle ya tiene descuento de inventario
      $inventar = Dfmlote::where('dformula_id', $detallex->id)->first();
      if (!isset($inventar->id)) { // se hace descuento de inventario si no existe un registro del detalle
        $cantidad = 0;
        foreach ($mlotexxx as $value) { // recorrer los lotes que tienen inventario del medicamento seleccionado
          /* completar el volumen de medicamento seleccionado que se necesita */
          if ($cantidad < $detallex->purga) {
            /* asiganar todo el inventario del lote */
            $cantidad = $this->getDescuento($detallex, $cantidad, $value);
          } else { // se completo lo solicitado
            break;
          }
        }
      }
    }
  }
  public function getOrden()
  {
    $fechahoy = date('Y-m-d', time());
    $ordendia = Orden::where('created_at', 'like', "{$fechahoy}%")->first();
    if (!isset($ordendia->id)) {
      $fechahoy = explode('-', $fechahoy);
      $ordendia = Orden::create([
        'ordeprod' => $fechahoy[2] . $fechahoy[1] . substr($fechahoy[0], 2, 2),
        'sis_esta_id' => 1, 'user_crea_id' => Auth::user()->id, 'user_edita_id' => Auth::user()->id
      ]);
    }
    return $ordendia;
  }
  public function getOrdenDia()
  {
    $ordendia = $this->getOrden();
    return $ordendia->ordeprod;
  }
  public function getOrdenDiaCombo()
  {
    $ordendia = $this->getOrden();
    return [$ordendia->id => $ordendia->ordeprod];
  }


}
