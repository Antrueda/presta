<?php
$controll = 'Clinicas\Paciente';
$routexxx = 'paciente';

Route::group(['prefix' => 'pacientes'], function () use ($routexxx, $controll) {
    Route::get('', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx);
	Route::get('nuevo', [
		'uses' => $controll . 'Controller@create',
		'middleware' => ['permission:' . $routexxx . '-crear']
    ])->name($routexxx . '.nuevo');
    Route::get('{padrexxx}/listaxxx', [
		'uses' => $controll . 'Controller@getListado',
		'middleware' => ['permission:' . $routexxx . '-leer']
	])->name($routexxx.'.listaxxx');

});


Route::group(['prefix' => 'paciente'], function () use ($controll, $routexxx) {

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

    Route::get('edadxxxx', [
	    'uses' => $controll.'Controller@getCalcularEdade',
	    'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar']
    ])->name($routexxx.'.edadxxxx');

    Route::get('municipio', [
	    'uses' => $controll.'Controller@getMunicipio',
	    'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar']
    ])->name($routexxx.'.municipio');



});
 require_once('web_formular.php');
