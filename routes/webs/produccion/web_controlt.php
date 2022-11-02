<?php
$controll = 'Produccion\Terminado';
$routexxx = 'controlt';
Route::group(['prefix' => $routexxx], function () use ($controll, $routexxx) {

	Route::get('', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx);
	Route::get('{padrexxx}/nuevo', [
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
	Route::get('ver/{objetoxx}', [
		'uses' => $controll . 'Controller@show',
		'middleware' => ['permission:' . $routexxx . '-leer']
	])->name($routexxx . '.ver');
	Route::delete('borrar/{objetoxx}', [
		'uses' => $controll . 'Controller@destroy',
		'middleware' => ['permission:' . $routexxx . '-borrar']
	])->name($routexxx . '.borrar');

	Route::get('pesoreal', [
		'uses' => $controll . 'Controller@getPesoreal',
		])->name($routexxx . '.pesoreal');
	});

		Route::group(['prefix' => 'controltreporte'], function () use ($controll, $routexxx) {
		Route::get('', [
		'uses' => 'Reporte\EtiquetaReporteController@indexreporte',
		'middleware' => ['permission:' . $routexxx . '-leer']
		])->name($routexxx . '.reporte');
		Route::get('listaxxx', [
			'uses' => 'Reporte\EtiquetaReporteController@getListado',
			'middleware' => ['permission:' . $routexxx . '-leer']
		])->name($routexxx.'.listaxxx');
});

