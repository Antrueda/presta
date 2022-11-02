<?php

use App\Helpers\Cformula\Validacionesajax;
use App\Helpers\Clinicas;
use Illuminate\Http\Request;
// Route::get('clinica/paciente', function (Request $request) {
//   if (!$request->ajax())
//     return redirect('/');
//   return Clinicas::getPacientes($request);
// });
Route::get('cformula/rangos', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Validacionesajax::getRango($request);
});


Route::get('cformula/volumen', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return response()->json(Validacionesajax::formulaciones($request->all()));
});

Route::get('cformula/calcular', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(['calculox'=>($request->volumenx>0 && $request->tiempoxx>0)?number_format(($request->volumenx/$request->tiempoxx),1):'']);
});


