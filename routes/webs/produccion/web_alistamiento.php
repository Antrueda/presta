<?php
Route::group(['prefix' => 'alistamientos'], function () {
    Route::get('', [
	    'uses' => 'Produccion\AlistamientoController@index',
	    'middleware' => ['permission:alistami-leer|alistami-crear|alistami-editar|alistami-borrar']
	])->name('alistami');
	Route::get('nuevo', [
	    'uses' => 'Produccion\AlistamientoController@create',
	    'middleware' => ['permission:alistami-crear']
	])->name('alistami.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\AlistamientoController@store',
	    'middleware' => ['permission:alistami-crear']
	])->name('alistami.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@edit',
	    'middleware' => ['permission:alistami-editar']
	])->name('alistami.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@update',
	    'middleware' => ['permission:alistami-editar']
	])->name('alistami.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@show',
	    'middleware' => ['permission:alistami-leer']
	])->name('alistami.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@destroy',
	    'middleware' => ['permission:alistami-borrar']
	])->name('alistami.borrar');
	Route::get('imprimir/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@getPdfCalistam',
	    'middleware' => ['permission:alistami-leer']
	])->name('alistami.imprimir');
	Route::get('alistamireporte', [
	    'uses' => 'Reporte\AlistamientoReporteController@indexreporte',
	    'middleware' => ['permission:alistami-leer|alistami-crear|alistami-editar|alistami-borrar']
	])->name('alistami.reporte');
	Route::get('listaxxx', [
		'uses' => 'Reporte\AlistamientoReporteController@getListado',
		'middleware' => ['permission:alistami-leer']
	])->name('alistami.listaxxx');
	
});
