<?php

use App\Helpers\Roles\Roles;
use App\Helpers\Usuarios\Usuarios;
use Illuminate\Http\Request;


Route::get('rol/roles', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Roles::getRoles($request);
});

Route::get('rol/permisos', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
    return Roles::getPermisos($request);
});
Route::get('rol/rpermisos', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
    return Roles::getRpermiso($request);
});
Route::get('rol/asignarpermiso', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
    return Roles::getAsignarPermiso($request);
});
