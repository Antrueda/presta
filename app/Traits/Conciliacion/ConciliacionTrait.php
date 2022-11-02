<?php

namespace App\Traits\Conciliacion;

use App\Models\Dispositivos\Dlote;
use App\Models\Medicamentos\Mlote;

trait ConciliacionTrait
{
  private $registro = [
    'medidisp' => '', // medicamento
    'lotexxxx' => '', // lote medicamento
    'consumid' => '', // cantidad consumida del medicamento
    'alistada' => '', // cantidad alistada del medicamento
    'sobrante' => '', // cantidad sobrante del medicamento
    'identifi' => '', // indentificador del medicamento
  ];
  private $concilia = [];
  private $dispocan;
  private $mediccan;
  public function __construct()
  {

    $this->concilia = [
      'dispoxxx' => [],
      'medicxxx' => [],
    ];
    $this->dispocan = 0;
    $this->mediccan = 0;
  }
  private function getDataDispositivo($dataxxxx)
  {
    return $this->concilia[$dataxxxx['campoxxx'] . 'xxx'];
  }
  private function getData($dataxxxx)
  {
    $medidisp = '';
    $lotexxxx = '';
    $campoxxx = explode('_', $dataxxxx['registro']->campo_id);
    if ($campoxxx[0] == 'dispo') {
      $medidisp = Dlote::find($campoxxx[1]);
      $lotexxxx = $medidisp->lotexxxx;
      $medidisp = $medidisp->dmarca->dmedico->nombrexx;
      $this->dispocan += 1;
    } else {
      $medidisp = Mlote::find($campoxxx[1]);
      $lotexxxx = $medidisp->lotexxxx;
      $medidisp = $medidisp->minvima->mmarca->medicame->nombgene;
      $this->mediccan += 1;
    }

    $registro['medidisp'] = $medidisp; // medicamento
    $registro['lotexxxx'] = $lotexxxx; // lote medicamento
    $registro['consumid'] = $dataxxxx['registro']->cantcons; // cantidad consumida del medicamento
    $registro['alistada'] = $dataxxxx['registro']->unidad; // cantidad alistada del medicamento
    $registro['sobrante'] = $dataxxxx['registro']->diferenc; // cantidad sobrante del medicamento
    $registro['identifi'] = $dataxxxx['registro']->campo_id; // indentificador del medicamento
    $this->concilia[$dataxxxx['campoxxx'] . 'xxx'][] = $registro;
  }
  private function getArmarData($dataxxxx)
  {
    foreach ($dataxxxx['padrexxx']->dalistams as $registro) {
       if($registro->unidad>0){
        $campoxxx = explode('_', $registro->campo_id);
        $this->getData(['campoxxx' => $campoxxx[0], 'registro' => $registro]);
       }

    }
  }
  public function getConsiliacion($dataxxxx)
  {
    $this->getArmarData($dataxxxx);
    for ($i = 0; $i < abs($this->dispocan - $this->mediccan); $i++) {
      if ($this->dispocan > $this->mediccan) {
        $this->concilia['medicxxx'][] = $this->registro;
      } else {
        $this->concilia['dispoxxx'][] = $this->registro;
      }
    }
    return $this->concilia;
  }
}
