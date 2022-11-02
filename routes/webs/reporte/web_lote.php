<?php
$controll = 'Reporte\LoteReporte';
$routexxx = 'cerliblo';
Route::group(['prefix' => $routexxx], function () use ($controll, $routexxx) {

    Route::get('', [
        'uses' => $controll . 'Controller@indexreporte',
        'middleware' => ['permission:' . $routexxx . '-leer']
    ])->name($routexxx.'.reporte');

    Route::get('imprimir/{objetoxx}', [
	    'uses' => $controll.'Controller@getControlespf',
	    'middleware' =>  ['permission:' . $routexxx . '-leer']
    ])->name($routexxx . '.imprimir');

    Route::get('listaxxx', [
		'uses' => $controll.'Controller@getListado',
		'middleware' => ['permission:' . $routexxx . '-leer']
    ])->name($routexxx.'.listaxxx');
  });
