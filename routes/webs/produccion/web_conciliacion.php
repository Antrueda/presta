<?php
Route::group(['prefix' => 'conciliaciones'], function () {
    Route::get('{padrexxx}', [
	    'uses' => 'Produccion\ConciliacionController@index',
	    'middleware' => ['permission:concilia-leer|concilia-crear|concilia-editar|concilia-borrar']
	])->name('concilia');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@edit',
	    'middleware' => ['permission:concilia-editar']
	])->name('concilia.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@update',
	    'middleware' => ['permission:concilia-editar']
	])->name('concilia.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@show',
	    'middleware' => ['permission:concilia-leer']
	])->name('concilia.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@destroy',
	    'middleware' => ['permission:concilia-borrar']
	])->name('concilia.borrar');
	Route::post('esnumerico', [
	    'uses' => 'Produccion\ConciliacionController@esnumerico',
	])->name('concilia.esnumerico');
	Route::get('imprimir/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@getPdfConciliacion',
	])->name('concilia.imprimir');

});
Route::group(['prefix' => 'conciliacionesreporte'], function () {
	Route::get('', [
	    'uses' => 'Reporte\ConciliaReporteController@indexreporte',
	    'middleware' => ['permission:concilia-leer']
	])->name('concilia.reporte');

	Route::get('listaxxx', [
		'uses' => 'Reporte\ConciliaReporteController@getListado',
		'middleware' => ['permission:concilia-leer']
	])->name('concilia.listaxxx');
});
