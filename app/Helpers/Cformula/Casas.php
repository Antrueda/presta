<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

/**
 * Description of Casas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class Casas
{

    public function aminoacidos($casoxxxx, $datasxxx)
    {
        $respuest = 0;
        switch ($casoxxxx['selevalu']) {
            case 1:
            case 2:
            case 3:
                $respuest = $casoxxxx['requerim'];
                break;
        }
        return ['requerim' => $respuest];
    }

    public function fosfatos($casoxxxx, $datasxxx)
    {


        $respuest = 0;
        switch ($casoxxxx['selevalu']) {
            case 1:
            case 2:
            case 5:
            case 7:
                $respuest = $casoxxxx['volumenx'];
                break;
        }
        return ['volumenx' => $respuest];
    }

    public function carbohidratos($casoxxxx, $datasxxx)
    {
        $respuest = 0;

        switch ($casoxxxx['selevalu']) {
            case 7:
                $respuest = $casoxxxx['volumenx'] / 2;
                break;
            case 8:
                $respuest = $casoxxxx['volumenx'] / 10;
                break;
        }

        return ['requtota' => $casoxxxx['requtota'], 'volumenx' => $respuest, 'requerim' => $casoxxxx['requerim']];
    }

    public function lipidos($casoxxxx, $datasxxx)
    {
        $respuest = 0;
        switch ($casoxxxx['selevalu']) {
            case 26:
            case 27:
            case 28:
                $respuest = $casoxxxx['requerim'];
                break;
        }
        return ['requerim' => $respuest];
    }
}
