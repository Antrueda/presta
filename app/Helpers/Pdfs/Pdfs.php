<?php

namespace App\Helpers\Pdfs;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class Pdfs
{
    public static function getImprimirPdf($dataxxxx) {
        $view = View::make($dataxxxx['vistaurl'], $dataxxxx['dataxxxx'])->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper($dataxxxx['dimensio']//array(0, 0, 9.5 * 72, 14.9 * 72)

            , "portrait");

        if ($dataxxxx['tipoxxxx'] == 1) {
          return $pdf->stream($dataxxxx['nombarch']);
        }
        if ($dataxxxx['tipoxxxx'] == 2) {
          return $pdf->download($dataxxxx['nombarch'].'.pdf');
        }
        if ($dataxxxx['tipoxxxx'] == 3) {
          return view($dataxxxx['nombarch'], $dataxxxx['dataxxxx']);
        }
      }

}
