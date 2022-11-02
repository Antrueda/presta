<?php

namespace App\Traits\Cformula;

use App\Models\Formulaciones\Cformula;

trait CalcularEdadTrait
{
    public function bisiesto($year)
    {
        if ((($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0))
            return 29;
        else
            return 28;
    }


    public function getCalcularDnp($formulac)
    {
        $date1 = new \DateTime($formulac->paciente->registro);
        $date2 = new \DateTime(date('Y-m-d', time()));
        $diff = $date1->diff($date2);
        $i = 0;
        $fechaxxx = explode('-', date('Y-m-d', time()));
        $diaxxxxx = $fechaxxx[2];
        $mesxxxxx = $fechaxxx[1];
        $anioxxxx = $fechaxxx[0];
        $dianutpa = 1;
        do { //echo $anioxxxx . '-' . str_pad($mesxxxxx, 2, "0", STR_PAD_LEFT) . '-' . str_pad($diaxxxxx, 2, "0", STR_PAD_LEFT).'<br>';
            $contarxx = count(Cformula::where('created_at', 'like', $anioxxxx . '-' . str_pad($mesxxxxx, 2, "0", STR_PAD_LEFT) . '-' . str_pad($diaxxxxx, 2, "0", STR_PAD_LEFT) . '%')->get());
            $diaxxxxx--;
            if ($contarxx > 0)
                $dianutpa++;
            if ($diaxxxxx == 0) {
                $diaxxxxx = $this->meses($anioxxxx, $mesxxxxx);
                $mesxxxxx--;
                if ($mesxxxxx == 0) {
                    $anioxxxx--;
                    $mesxxxxx = 12;
                }
            }
            $i++;
        } while ($contarxx != 0);
        return $dianutpa;
    }

    public function meses($anioxxxx, $mesxxxxx)
    {
        $mesesxxx = [31, $this->bisiesto($anioxxxx), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        return $mesesxxx[$mesxxxxx - 1];
    }

    public function hallarmeses($fechanac, $restadia, $mesnacim, $mesactul, $anioactu, $dianacim, $diactual)
    {
        if ($restadia < 0) {
            $fechanac[1] = 12 - $mesnacim + ($mesactul - 1);
            $fechanac[2] = ($this->meses($anioactu, $mesactul - 1) - $dianacim) + $diactual;
        } else { // el dia actual es mayor al de la fecha de nacimiento
            $fechanac[1] = 12 - $mesnacim + $mesactul;
            $fechanac[2] = $restadia;
        }
        return $fechanac;
    }

    public function hallardias($fechanac, $restadia, $restames, $anioactu, $mesactul, $dianacim, $diactual)
    {
        if ($restadia < 0) { // el dia de naciemiento es mayor al dia actual
            $fechanac[1] = $restames - 1;
            $fechanac[2] = ($this->meses($anioactu, $mesactul - 1) - $dianacim) + $diactual;
        } else { // el dia actual es mayor al de la fecha de nacimiento
            $fechanac[1] = $restames;
            $fechanac[2] = $restadia;
        }
        return $fechanac;
    }

    public function edad($fechanac)
    {
        $diactual = date("d");
        $mesactul = date("m");
        $anioactu = date("Y");
        $dianacim = date("d", strtotime($fechanac));
        $mesnacim = date("m", strtotime($fechanac));
        $anionaci = date("Y", strtotime($fechanac));
        $restadia = $diactual - $dianacim;
        $restames = $mesactul - $mesnacim;
        $restanio = $anioactu - $anionaci;
        $fechanac = [0, 0, 0];
        // es menor a un mes
        if ($anioactu == $anionaci && $mesactul == $mesnacim) {
            $fechanac[2] = $restadia;
        }
        // es menor a un año nacido en el mismo año
        if ($anioactu == $anionaci) {
            $fechanac = $this->hallardias($fechanac, $restadia, $restames, $anioactu, $mesactul, $dianacim, $diactual);
        } else {
            // menor a un año nacido en el año anterior
            if ($restanio == 1 && $restames <= 0) {
                if ($restames == 0) { // es el mismo mes de nacimiento del año siguiente
                    $fechanac[1] = 11;
                    if ($restadia < 0) {
                        $fechanac[2] = $this->meses($anioactu, $mesactul - 1) - $dianacim + $diactual;
                    }
                } else { // es un mes anterior al de nacimiento en el año siguiente
                    $fechanac = $this->hallarmeses($fechanac, $restadia, $mesnacim, $mesactul, $anioactu, $dianacim, $diactual);
                }
            } else { /// es mayor a un año
                if ($restames < 0) {
                    $fechanac[0] = $restanio - 1;
                    $fechanac = $this->hallarmeses($fechanac, $restadia, $mesnacim, $mesactul, $anioactu, $dianacim, $diactual);
                } else if ($restames == 0) {
                    $fechanac[0] = $restanio - 1;
                    $fechanac[1] = 11;
                    if ($restadia < 0) {
                        $fechanac[2] = $this->meses($anioactu, $mesactul - 1) - $dianacim + $diactual;
                    } else {
                        $fechanac[2] = $restadia;
                    }
                } else {
                    $fechanac[0] = $restanio;
                    $fechanac = $this->hallardias($fechanac, $restadia, $restames, $anioactu, $mesactul, $dianacim, $diactual);
                }
            }
        }

        $diasxxxx = ' día';
        $mesxxxxx = ' mes';
        $anioxxxx = ' año';
        if ($fechanac[2] > 0) {
            $diasxxxx = $diasxxxx . 's';
        }
        if ($fechanac[1] > 0) {
            $mesxxxxx = $mesxxxxx . 'es';
        }
        if ($fechanac[0] > 0) {
            $anioxxxx = $anioxxxx . 's';
        }
        return $fechanac[0] . $anioxxxx . ' ' . $fechanac[1] . $mesxxxxx . ' ' . $fechanac[2] . $diasxxxx;
    }
}
