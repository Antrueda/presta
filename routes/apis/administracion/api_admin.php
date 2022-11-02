<?php

use App\Helpers\Administracion;

use Illuminate\Http\Request;


Route::get('administracion/rango', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Administracion::getRangos($request);
});
Route::get('administracion/rnpts', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Administracion::getNpts($request);
});

Route::get('administracion/condiciones', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Administracion::getCondiciones($request);
});
Route::get('administracion/codigos', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Administracion::getCodigos($request);
});
Route::get('administracion/eps', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Administracion::getEps($request);
});

