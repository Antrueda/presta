<?php

$routexxx = 'preplibe';
$controll = "Produccion\Pro" . ucfirst($routexxx) . "Controller@";
Route::group(['prefix' => $routexxx], function () use ($controll, $routexxx) {

	Route::get('', [
		'uses' => $controll . 'index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx);
    Route::get('listaxxx', [
		'uses' => $controll . 'getListadox',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx.'.listaxxx');



	Route::get('nuevo', [
		'uses' => $controll . 'create',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.nuevo');
	Route::post('crear', [
		'uses' => $controll . 'store',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.crearxxx');
	Route::get('editar/{objetoxx}', [
		'uses' => $controll . 'edit',
		'middleware' => ['permission:' . $routexxx . '-editar']
	])->name($routexxx . '.editarxx');
	Route::put('editar/{objetoxx}', [
		'uses' => $controll . 'update',
		'middleware' => ['permission:' . $routexxx . '-editar']
	])->name($routexxx . '.editarxx');
	Route::get('ver/{objetoxx}', [
		'uses' => $controll . 'show',
		'middleware' => ['permission:' . $routexxx . '-leer']
	])->name($routexxx . '.verxxxxx');

	Route::get('borrar/{objetoxx}', [
        'uses' => $controll . 'inactivate',
        'middleware' => ['permission:' . $routexxx . '-borrarxx']
    ])->name($routexxx . '.borrarxx');
    Route::put('borrar/{objetoxx}', [
        'uses' => $controll . 'destroy',
        'middleware' => ['permission:' . $routexxx . '-borrarxx']
    ])->name($routexxx . '.borrarxx');
    Route::get('activate/{objetoxx}', [
        'uses' => $controll . 'activate',
        'middleware' => ['permission:' . $routexxx . '-activarx']
    ])->name($routexxx . '.activarx');
    Route::put('activate/{objetoxx}', [
        'uses' => $controll . 'activar',
        'middleware' => ['permission:' . $routexxx . '-activarx']
    ])->name($routexxx . '.activarx');
});
