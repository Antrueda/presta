<?php
Route::group(['prefix' => 'controlesp'], function () {
    Route::get('', [
	    'uses' => 'Produccion\ControlPController@index',
	    'middleware' => ['permission:controlp-leer|controlp-crear|controlp-editar|controlp-borrar']
	])->name('controlp');
	Route::get('{padrexxx}/nuevo', [
	    'uses' => 'Produccion\ControlPController@create',
	    'middleware' => ['permission:controlp-crear']
	])->name('controlp.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\ControlPController@store',
	    'middleware' => ['permission:controlp-crear']
	])->name('controlp.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@edit',
	    'middleware' => ['permission:controlp-editar']
	])->name('controlp.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@update',
	    'middleware' => ['permission:controlp-editar']
	])->name('controlp.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@show',
	    'middleware' => ['permission:controlp-leer']
	])->name('controlp.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@destroy',
	    'middleware' => ['permission:controlp-borrar']
	])->name('controlp.borrar');

	Route::get('controlp.reporte', [
	    'uses' => 'Produccion\ControlPController@indexreporte',
	    'middleware' => ['permission:controlp-leer|controlp-crear|controlp-editar|controlp-borrar']
	])->name('controlp.reporte');
});
