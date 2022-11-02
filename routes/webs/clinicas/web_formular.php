<?php

$controll = 'Clinicas\Cformula';
$routexxx = 'formular';

Route::group(['prefix' => '{padrexxx}/formulaciones'], function () use ($routexxx, $controll) {
    Route::get('', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx);
	Route::get('nuevo', [
		'uses' => $controll . 'Controller@create',
		'middleware' => ['permission:' . $routexxx . '-crear']
    ])->name($routexxx . '.nuevo');
    Route::get('listaxxx', [
		'uses' => $controll . 'Controller@getListado',
		'middleware' => ['permission:' . $routexxx . '-leer']
	])->name($routexxx.'.listaxxx');
    Route::post('crear', [
		'uses' => $controll . 'Controller@store',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.crear');
});



Route::group(['prefix' => 'formula'], function () use ($controll, $routexxx) {


	Route::get('editar/{objetoxx}', [
		'uses' => $controll . 'Controller@edit',
		'middleware' => ['permission:' . $routexxx . '-editar']
	])->name($routexxx . '.editar');
	Route::put('editar/{objetoxx}', [
		'uses' => $controll . 'Controller@update',
		'middleware' => ['permission:' . $routexxx . '-editar']
	])->name($routexxx . '.editar');
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

    Route::get('copiar/{objetoxx}', [
		'uses' => $controll . 'Controller@copy',
		'middleware' => ['permission:' . $routexxx . '-copiar']
	])->name($routexxx . '.copiar');
	Route::put('copiar/{objetoxx}', [
		'uses' => $controll . 'Controller@copyu',
		'middleware' => ['permission:' . $routexxx . '-copiar']
	])->name($routexxx . '.copiar');

	Route::get('formular', [
		'uses' => $controll . 'Controller@getFormular',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx . '.formular');

    Route::get('pedineon', [
		'uses' => $controll . 'Controller@getPedineon',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx . '.pedineon');

	Route::get('getRequerimientoVolumenq', [
		'uses' => $controll . 'Controller@getRequerimientoVolumenq',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx.'.rangvolu');


});




