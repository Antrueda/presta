<?php
$controll = 'Reporte\ControlPF';
$routexxx = 'controlpf';
Route::group(['prefix' => $routexxx], function () use ($controll, $routexxx) {

    Route::get('', [
        'uses' => $controll . 'Controller@index',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx);
  
    Route::get('ver/{objetoxx}', [
        'uses' => $controll . 'Controller@show',
        'middleware' => ['permission:' . $routexxx . '-leer']
    ])->name($routexxx . '.ver');

    Route::get('imprimir/{objetoxx}', [
	    'uses' => $controll.'Controller@getControlespf',
	    'middleware' =>  ['permission:' . $routexxx . '-leer']
    ])->name($routexxx . '.imprimir');
    
    Route::get('listaxxx', [
		'uses' => $controll.'Controller@getListado',
		'middleware' => ['permission:'.$routexxx.'-leer']
    ])->name($routexxx.'.listaxxx');
    Route::get('editar/{objetoxx}', [
	    'uses' => $controll.'Controller@edit',
	    'middleware' => ['permission:ordprodu-editar']
	])->name($routexxx.'.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => $controll.'Controller@update',
	    'middleware' => ['permission:ordprodu-editar']
	])->name($routexxx.'.editar');

  });
