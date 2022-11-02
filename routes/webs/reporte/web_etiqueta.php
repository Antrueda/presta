<?php
$controll = 'Reporte\EtiquetaReporte';
$routexxx = 'etiqueta';
Route::group(['prefix' => $routexxx], function () use ($controll, $routexxx) {

    Route::get('', [
        'uses' => $controll . 'Controller@index',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-imprimir' ]
    ])->name($routexxx);
    Route::get('imprimir/{objetoxx}', [
	    'uses' => $controll.'Controller@imprimirEtiquetaNpt',
	    'middleware' =>  ['permission:' . $routexxx . '-leer']
    ])->name($routexxx . '.imprimir');

    Route::get('listaxxx', [
		'uses' => $controll.'Controller@getListado',
		'middleware' => ['permission:'.$routexxx.'-leer']
    ])->name($routexxx.'.listaxxx');

  });
