<?php
use App\Helpers\Produccion\Produccion;
use Illuminate\Http\Request;


Route::get('produccion/produccion', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Produccion::getPacientesCformula($request);
});

Route::get('produccion/revision', function (Request $request) {
    if (!$request->ajax())
      return redirect('/');

    return Produccion::getPacientesRevision($request);
  });
Route::get('produccion/alistamiento', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Produccion::getAlistamientos($request);
});
Route::get('produccion/preparacion', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Produccion::getPacientesPreparacion($request);
});

Route::get('produccion/procesos', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Produccion::getControles($request);
});
Route::get('produccion/terminados', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Produccion::getTerminados($request);
});
Route::get('produccion/conciliaciones', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Produccion::getConciliaciones($request);
});

Route::get('produccion/conciliacionestotal', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Produccion::getConciliacionesTotal($request);
});
