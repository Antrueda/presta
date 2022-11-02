<?php

namespace App\Traits\Combos;

use App\Models\Medicamentos\Npt;
use App\Models\Medicamentos\Unidad\Rangonpt;
use App\Models\Medicamentos\Unidad\Unidad;
use App\Models\Medicamentos\Unidad\Unidrang;

trait Combos
{

  public function getUnidads($dataxxxx)
  {
    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    $activida = Unidad::get();
    foreach ($activida as $registro) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->s_unidad];
      } else {
        $comboxxx[$registro->id] = $registro->s_unidad;
      }
    }
    return $comboxxx;
  }

  public function getUnidrangs($dataxxxx)
  {
    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    $activida = Unidrang::where('unidad_id', $dataxxxx['padrexxx'])->get();
    foreach ($activida as $registro) {
      $rangoxxx= $registro->rangonpt->randesde.' '.$registro->rangonpt->ranhasta.' '.$registro->unidad->s_unidad;
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $rangoxxx];
      } else {
        $comboxxx[$registro->id] = $rangoxxx;
      }
    }
    return $comboxxx;
  }

  public function getRangonpts($dataxxxx)
  {
    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    $activida = Rangonpt::get();
    foreach ($activida as $registro) {
      $rangoxxx= $registro->randesde.' - '.$registro->ranhasta;
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $rangoxxx];
      } else {
        $comboxxx[$registro->id] = $rangoxxx;
      }
    }
    return $comboxxx;
  }

  public function getUrnpts($dataxxxx)
  {
    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    $activida = Unidrang::get();
    foreach ($activida as $registro) {
      $rangoxxx= $registro->rangonpt->randesde.' - '.$registro->rangonpt->ranhasta.' '.$registro->unidad->s_unidad;
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $rangoxxx];
      } else {
        $comboxxx[$registro->id] = $rangoxxx;
      }
    }
    return $comboxxx;
  }

  public function getNpts($dataxxxx)
  {
    $comboxxx = [];
    if ($dataxxxx['cabecera']) {
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
      } else {
        $comboxxx = ['' => 'Seleccione'];
      }
    }
    $activida = Npt::get();
    foreach ($activida as $registro) {
      $rangoxxx= $registro->nombre;
      if ($dataxxxx['ajaxxxxx']) {
        $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $rangoxxx];
      } else {
        $comboxxx[$registro->id] = $rangoxxx;
      }
    }
    return $comboxxx;
  }
}
