<?php

namespace App\Helpers;

use Carbon\Carbon;

class Fechas
{
  public static function getDiasEntreFecha($fechmeno, $fechmayo)
  {


    return Carbon::parse($fechmeno)->floatDiffInDays($fechmayo);
  }

  public static function getEdad($request)
  {
    $fechactu = explode('-', date('Y-m-d', time()));
    $fechnaci = explode('-', $request->fechnaci);
    $aniosxxx = Carbon::createFromDate($fechnaci[0], $fechnaci[1], $fechnaci[2])->age;
    /**
     * conocer cantidad de meses 
     */


    // $diasxxxx=0;
    // if ($fechactu[1] != $fechnaci[1]) { // cumplió años el año pasado
    //   $mesesxxx=12-$fechnaci[1];
    // }
    // $mesesxxx=$mesesxxx+$fechactu[1];

    /**
     * conocer cantidad de meses
     */
    $fmesesxx = $fechactu[0] . '-' . $fechnaci[1] . '-' . $fechnaci[2];
    if ($fechactu[1] < $fechnaci[1]) { // cumplio años el año pasado
      $menosuno = $fechnaci[1];
      if ($fechactu[2] < $fechnaci[2]) {
        $menosuno = $menosuno + 1;
      }
      $fmesesxx = ($fechactu[0] - 1) . '-' . $menosuno . '-' . $fechnaci[2];
    }
    //echo $mesesxxx;
    $fdiasxxx = $fechactu[0] . '-' . $fechactu[1] . '-' . $fechnaci[2];
    $mesesxxx = (int) Carbon::parse($fmesesxx)->floatDiffInMonths(date('Y-m-d', time()));
    if ($fechactu[2] < $fechnaci[2]) {
      $fdiasxxx = $fechactu[0] . '-' . ($fechactu[1] - 1) . '-' . $fechnaci[2];
    }
    $diasxxxx = (int) Carbon::parse($fdiasxxx)->floatDiffInDays(date('Y-m-d', time()));
    //echo $diasxxxx;
    return ['edadxxxx' => 'Años ' . $aniosxxx . ' Meses ' . $mesesxxx . ' Días ' . $diasxxxx];
  }
}
