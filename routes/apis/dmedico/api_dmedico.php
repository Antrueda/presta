<?php

use App\Helpers\Dispositivos\Dispositivos;
use Illuminate\Http\Request;

Route::get('dmedico/dmedico', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Dispositivos::getDispositivos($request);
});

Route::get('dmedico/dmarca', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

    return Dispositivos::getMarcas($request);
});



Route::get('dmedico/dlote', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

    return Dispositivos::getLotes($request);
});


