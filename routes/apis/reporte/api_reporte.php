<?php

use App\Helpers\Reporte\Controlpf;
use App\Helpers\Reporte\Orden;
use App\Models\Sistema\Municipio;
use Illuminate\Http\Request;


Route::get('reporte/controlpf', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Controlpf::getOrdenControlPf($request);
});

Route::get('reporte/orden', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Orden::getOrden($request);
});
