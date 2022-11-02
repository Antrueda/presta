<?php

use App\Helpers\Medicamentos\Unidads;
use Illuminate\Http\Request;

Route::get('unidad/rangonpts', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Unidads::getRangonpts($request);
});

Route::get('unidad/unidades', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Unidads::getUnidads($request);
});

Route::get('unidad/unidrangs', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Unidads::getUnidrangs($request);
});

Route::get('unidad/urnpts', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Unidads::getUrnpts($request);
});
