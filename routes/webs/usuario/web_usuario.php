<?php
$controll = 'Usuario\Usuario';
$routexxx = 'usuarios';
Route::group(['prefix' => 'usuarios'], function () use ($controll, $routexxx) {

	Route::get('', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx);
    Route::get('listaxxx', [
		'uses' => $controll . 'Controller@getListado',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx.'.listaxxx');
	Route::get('nuevo', [
		'uses' => $controll . 'Controller@create',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.nuevo');
	Route::post('crear', [
		'uses' => $controll . 'Controller@store',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.crear');

	Route::get('editar/{objetoxx}', [
		'uses' => $controll . 'Controller@edit',
		'middleware' => ['permission:' . $routexxx . '-editar']
	])->name($routexxx . '.editar');

	Route::put('editar/{objetoxx}', [
		'uses' => $controll . 'Controller@update',
		'middleware' => ['permission:' . $routexxx . '-editar']
    ])->name($routexxx . '.editar');

    Route::get('polidato/{objetoxx}', [
		'uses' => $controll . 'Controller@polidatoe',
		'middleware' => ['permission:' . $routexxx . '-polidato']
	])->name($routexxx . '.polidato');

	Route::put('polidato/{objetoxx}', [
		'uses' => $controll . 'Controller@polidatou',
		'middleware' => ['permission:' . $routexxx . '-polidato']
	])->name($routexxx . '.polidatx');

	Route::get('ver/{objetoxx}', [
		'uses' => $controll . 'Controller@show',
		'middleware' => ['permission:' . $routexxx . '-leer']
	])->name($routexxx . '.ver');
	Route::get('borrar/{objetoxx}', [
	    'uses' => $controll.'Controller@inactivate',
	    'middleware' => ['permission:'.$routexxx.'-borrar']
    ])->name($routexxx.'.borrar');

    Route::put('borrar/{objetoxx}', [
		'uses' => $controll . 'Controller@destroy',
		'middleware' => ['permission:' . $routexxx . '-borrar']
    ])->name($routexxx . '.borrar');
	require_once('web_urol.php');
});
