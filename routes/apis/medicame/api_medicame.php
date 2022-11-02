<?php

use App\Helpers\Medicamentos\Medicames;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Minvima;
use App\Models\Medicamentos\Mlote;
use App\Models\Medicamentos\Mmarca;
use Illuminate\Http\Request;

Route::get('medicame/casa', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Casa::select('casas.id', 'casas.casa', 's_estado', 'casas.sis_esta_id')
        ->join('sis_estas', 'casas.sis_esta_id', '=', 'sis_estas.id')
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('medicame/medicame', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Medicame::select('medicames.id', 'medicames.nombgene', 's_estado', 'medicames.sis_esta_id')
        ->join('sis_estas', 'medicames.sis_esta_id', '=', 'sis_estas.id')
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('medicame/mmarca', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Mmarca::select('mmarcas.id', 'mmarcas.nombcome', 's_estado', 'mmarcas.sis_esta_id', 'mmarcas.medicame_id')
        ->join('sis_estas', 'mmarcas.sis_esta_id', '=', 'sis_estas.id')
        ->where('mmarcas.medicame_id', $request->medicame)
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('medicame/minvima', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Medicames::getRInvimas( $request);
});

Route::get('medicame/mlote', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Mlote::select('mlotes.id', 'mlotes.lotexxxx', 's_estado', 'mlotes.sis_esta_id', 'mmarcas.medicame_id')
        ->join('minvimas', 'mlotes.minvima_id', '=', 'minvimas.id')
        ->join('mmarcas', 'minvimas.mmarca_id', '=', 'mmarcas.id')
        ->join('sis_estas', 'mlotes.sis_esta_id', '=', 'sis_estas.id')
        ->where('mmarcas.medicame_id', $request->medicame)
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('medicame/minvimaajax', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return response()->json(Minvima::combo([
    'padrexxx' => $request->padrexxx,
    'cabecera' => true, 'esajaxxx' => true
  ]));
});

Route::get('medicame/mnpt', function (Request $request) {
    if (!$request->ajax())
      return redirect('/');

    return Medicames::getNptAsignados($request);
  });
