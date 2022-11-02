<?php

namespace App\Traits\Cformula;

use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;

trait PintarFormularioTrait
{
    public function getMCasas($dataxxxx)
    {
      $medicame = Medicame::select('medicames.id', 'medicames.nombgene')
        ->join('mnpts', 'medicames.id', '=', 'mnpts.medicame_id')
        ->join('urangnpts', 'mnpts.urangnpt_id', '=', 'urangnpts.id')
        ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')

        ->where('urangnpts.npt_id', $dataxxxx['cformula']->paciente->npt_id)
        ->where('medicame_sis_clinica.sis_clinica_id', $dataxxxx['cformula']->paciente->sis_clinica->id)
        ->where('medicames.casa_id', $dataxxxx['casaidxx'])
        ->get();

      $comboxxx = [];
      if ($dataxxxx['tipocomb']) {
        if ($dataxxxx['cabecera']) {
          if ($dataxxxx['ajaxxxxx']) {
            $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
          } else {
            $comboxxx = ['' => 'Seleccione'];
          }
        }
      }
      foreach ($medicame as $registro) {
        if ($dataxxxx['tipocomb']) {
          if ($dataxxxx['ajaxxxxx']) {
            $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->nombgene];
          } else {
            $comboxxx[$registro->id] = $registro->nombgene;
          }
        } else {
          $comboxxx[] = $registro->id;
        }
      }
      return $comboxxx;
    }
    public function getCasaMedicamentos($dataxxxx, $casaidxx)
    {
        $tienemed = false;
        $medicame = Medicame::select('medicames.id', 'medicames.nombgene')
            ->join('mnpts', 'medicames.id', '=', 'mnpts.medicame_id')
            ->join('urangnpts', 'mnpts.urangnpt_id', '=', 'urangnpts.id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->where('urangnpts.npt_id', $dataxxxx['cformula']->paciente->npt_id)
            ->where('medicame_sis_clinica.sis_clinica_id', $dataxxxx['cformula']->paciente->sis_clinica->id)
            ->where('medicames.casa_id', $casaidxx)
            ->first();
        if (isset($medicame->id)) {
            $tienemed = true;
        }
        return $tienemed;
    }
    public function getPintarFormulario($dataxxxx)
    {
        $formulacion = [];

        // listar las casas que apliquen
        $casasxxx = Casa::select('casas.id', 'casas.casa', 'unidmedi', 'nameidxx')
            ->orderBy('casas.ordecasa', 'ASC')->get();
        //    // recorre las casas
        $existexx = ['elemtraz', 'multivit', 'multiuno'];
        $aguaxxxx = ['aguaeste'];
        $aguaeste = 0;
        foreach ($casasxxx as $key => $value) {
            if ($this->getCasaMedicamentos($dataxxxx, $value->id)) {
                $selevalu = '';
                $requerim = '';
                //$selvalfi = '';
                $volumenx = '';
                $requtota = '';
                // saber cuales son los medicames que aplican para la lista
                $dataxxxx['casaidxx'] = $value->id;
                $dataxxxx['cabecera'] = false;
                $dataxxxx['ajaxxxxx'] = false;
                $dataxxxx['tipocomb'] = true;
                $selelist = $this->getMCasas($dataxxxx);
                $dataxxxx['tipocomb'] = false;
                $combo_id =  $this->getMCasas($dataxxxx);
                //$combo_id = Medicame::combo1($value->id, false, $dataxxxx['paciente'], []);
                // cuando se pinta el formulario con datos
                if (isset($dataxxxx['furmulac']->id)) {
                    // todos los medicames formulados
                    foreach ($dataxxxx['furmulac']->dformulas as $valor) {
                        foreach ($combo_id as $combo) {
                            if ($valor->medicame_id == $combo) {
                                $selevalu = $valor->medicame_id;
                                $requerim = $valor->cantidad;
                                $requtota = $valor->rtotal;
                                $volumenx = number_format($valor->volumen, 2);
                            }
                        }
                    }
                }

                $pedineon = (in_array($value['nameidxx'], $existexx) == true && $dataxxxx['cformula']->paciente->npt_id < 3);
                $aguaeste = (in_array($value['nameidxx'], $aguaxxxx) == true);

                $formulacion[] = [
                    'casaxxxx' => $value['casa'],
                    'campo_id' => $value['nameidxx'], // nombre del campo con el que se guarda
                    'selelist' => $selelist,
                    'selevalu' => $selevalu,
                    'requerim' => $requerim,
                    'requtota' => $requtota,
                    'volumenx' => $volumenx,
                    'readonly' =>  $pedineon ? 'readonly' : ($aguaeste ? 'readonly' : ''),
                    ///'valorxxx' => 4,
                    'unidmedi' => $value->unidmedi,
                ];
            }
        }
        return $formulacion;
    }
}
