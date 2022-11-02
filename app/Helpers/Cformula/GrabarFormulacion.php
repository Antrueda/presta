<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Dformula;

/**
 * Description of Casas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class GrabarFormulacion
{

    public function FunctionName()
    {
        $dataxxxx = [
            "_token" => "XQ9UifgssCuXYblREwO1XH8NxrOMk5pdbjuKSZqA",
            "sis_clinica_id" => 1,
            "tiempo" => "24",
            "velocidad" => "55.5",
            "volumen" => "1332",
            "purga" => "40",
            "peso" => "18",
            "aminoaci" => "1",
            "aminoaci_cant" => "2.00",
            "aminoaci_volu" => "360",
            "fosfatox" => "5",
            "fosfatox_cant" => "3.60",
            "fosfatox_volu" => "3.6",
            "carbohid" => "8",
            "carbohid_cant" => "5.80",
            "carbohid_volu" => "300.67",
            "sodioxxx" => "10",
            "sodioxxx_cant" => "3.00",
            "sodioxxx_volu" => "23.4",
            "potasiox" => "11",
            "potasiox_cant" => "2.00",
            "potasiox_volu" => "18",
            "calcioxx" => "12",
            "calcioxx_cant" => "16.00",
            "calcioxx_volu" => "2.88",
            "magnesio" => "13",
            "magnesio_cant" => "2.44",
            "magnesio_volu" => "0.22",
            "elemtraz" => "17",
            "elemtraz_cant" => "69.44",
            "elemtraz_volu" => "5",
            "multivit" => "20",
            "multivit_cant" => "400.00",
            "multivit_volu" => "10",
            "acidfoli" => "24",
            "acidfoli_cant" => null,
            "acidfoli_volu" => null,
            "vitamink" => "25",
            "vitamink_cant" => null,
            "vitamink_volu" => null,
            "lipidosx" => "26",
            "lipidosx_cant" => "2.00",
            "lipidosx_volu" => "180",
            "multiuno" => "19",
            "multiuno_cant" => "2300.00",
            "multiuno_volu" => "10",
            "aguaeste" => "29",
            "aguaeste_cant" => null,
            "aguaeste_volu" => "418.23",
            "desdexxx" => 10,
            "paciente_id" => "4288",
            "cformula" => Cformula::find(7),
            "npt_id" => 2
        ];
    }

    public static function setDformula($cabecera)
    {
        $cabecera['npt_id'] = $cabecera['cformula']->paciente->npt_id;
        if (count($cabecera['cformula']->dformulas)) {
            Dformula::where('cformula_id', $cabecera['cformula']->id)->delete();
        }


        foreach ($cabecera as $key => $value) {
            $data = explode('_', $key);
            if (isset($data[1]) && $data[1] == 'volu') {
                if ($data[0] == 'aguaeste') {
                    $cabecera[$data[0] . '_cant'] = 1;
                    $cabecera[$data[0] . '_vopu'] = (float)$cabecera['cformula']->total / (float)$cabecera['cformula']->volumen * (float)$cabecera[$data[0] . '_volu'];
                    $cabecera[$data[0] . '_reto'] = 1;
                }

                $grabarxx = [
                    'cformula_id' => $cabecera['cformula']->id,
                    'medicame_id' => $cabecera[$data[0]],
                    'cantidad' => (float)$cabecera[$data[0] . '_cant'],
                    'rtotal' => (float)$cabecera[$data[0] . '_reto'],
                    'volumen' => (float)$cabecera[$data[0] . '_volu'],
                    'purga' => (float)$cabecera[$data[0] . '_vopu'],
                    'user_crea_id' => auth()->user()->id,
                    'user_edita_id' => auth()->user()->id,
                    'sis_esta_id' => 1
                ];
                Dformula::create($grabarxx);
            }
        }

        return $cabecera['cformula']->id;
    }
}
