<?php

namespace App\Traits\Pestanias;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait ProduccionTrait
{
  /**
   * array estructural de las pestañas
   */
  private $pestania = [
    /**
     * arrays para las pestañas de conciliación
     */
    'alisconc' => ['disabled', '', '', '', false], // pestaña ALISTAMIENTO/CONCILIACION
    'alistami' => ['disabled', '', '', '', false], // petanña ALISTAMIENTO
    'concilia' => ['disabled', '', '', '', false], // petanña CONCILIACION
    /**
     * arrays para las pestañas de producción
     */
    'producci' => ['', '', '', '', false], // pestaña PRODUCCION
    'preplibe' => ['', '', '', '', false], // petanña REVISION
    'revision' => ['', '', '', '', false], // petanña REVISION
    'preparac' => ['', '', '', '', false], // petanña PREPARACIONES
    'controlp' => ['', '', '', '', false], // petanña CONTROL EN PROCESO
    'controlt' => ['', '', '', '', false], // petanña CONTROL PRODUCTOS TERMININADOS
  ];
  public function getSD($dataxxxx)
  {
    return isset(DB::table($dataxxxx['tablaxxx'])->first()->id) ? 'success' : 'danger';
  }



  /**
   * se crea lo lógica de la funcionalidad de las pestañas
   */
  public function getPestanias($dataxxxx)
  {
    $succdang = '';
    switch ($dataxxxx['tablaxxx']) {
        case 'preplibe':
            $this->pestania['producci'][4] = true;
        $this->pestania['producci'][3] = 'active';
        $this->pestania['producci'][2] = 'success';

            break;
      case 'alistami':
        $this->pestania[$dataxxxx['tablaxxx']][1] = route($dataxxxx['tablaxxx'], []);
        $this->pestania['alisconc'][4] = true;
        $this->pestania['alisconc'][3] = 'active';
        $succdang =
          isset(DB::table('calistams')->first()->id) ? 'success' : 'danger';
        break;
      case 'concilia':
        $this->pestania['alistami'][1] = route('alistami', []);
        $this->pestania['alistami'][0] = '';

        $this->pestania[$dataxxxx['tablaxxx']][1] = route($dataxxxx['tablaxxx'], [$dataxxxx['padrexxx']->id]);
        $this->pestania['alisconc'][4] = true;
        $this->pestania['alisconc'][3] = 'active';
        $succdang =
          isset(DB::table('calistams')->first()->id) ? 'success' : 'danger';
        break;
      case 'revision':
        $this->pestania['producci'][4] = true;
        $this->pestania['producci'][3] = 'active';
        $this->pestania['producci'][2] = isset(DB::table('cformulas')->where('userevis_id', null)->first()->id) ? 'danger' : 'success';
        break;
      case 'preparac':
        $this->pestania['producci'][4] = true;
        $this->pestania['producci'][3] = 'active';
        $succdang = isset(DB::table('cformulas')->first()->id) ? 'success' : 'danger';
        break;
      case 'controlp':
        $this->pestania['producci'][4] = true;
        $this->pestania['producci'][3] = 'active';
        $succdang =
          isset(DB::table('cformulas')->first()->id) ? 'success' : 'danger';
        break;
      case 'controlt':
        $this->pestania['producci'][4] = true;
        $this->pestania['producci'][3] = 'active';
        $succdang =
          isset(DB::table('cformulas')->first()->id) ? 'success' : 'danger';
        break;
    }
    /**
     * pestaña padre ALISTAMIENTO
     */

    $this->pestania['alisconc'][1] =  route('alistami', []);
    $this->pestania['alisconc'][0] = '';
    /**
     * pestaña padre PRODUCCION
     */
    // $this->pestania['producci'][2] = $succdang;
    $routexxx = '';
    switch (Auth::user()->roles[0]->id) {
      case 3:
        $routexxx = 'revision';
        break;
      case 4:
        $routexxx = 'preparac';
        break;
      case 5:
        $routexxx = 'controlp';
        break;
      case 6:
        $routexxx = 'controlt';
        break;
      default:
        $routexxx = 'revision';
    }
    $this->pestania['producci'][1] =  route($routexxx, []);
    $this->pestania['producci'][0] = '';
    /**
     * pestaña hija
     */
    $this->pestania['preplibe'][1] =  route('preplibe', []);
    $this->pestania['revision'][1] =  route('revision', []);
    $this->pestania['preparac'][1] =  route('preparac', []);
    $this->pestania['controlp'][1] =  route('controlp', []);
    $this->pestania['controlt'][1] =  route('controlt', []);

    $this->pestania[$dataxxxx['tablaxxx']][3] = 'active';
    $this->pestania[$dataxxxx['tablaxxx']][2] = $succdang;
    $this->pestania[$dataxxxx['tablaxxx']][0] = '';
    return $this->pestania;
  }
}
