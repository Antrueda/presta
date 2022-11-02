<?php
Route::group(['prefix' => 'preparaciones'], function () {
    Route::get('', [
	    'uses' => 'Produccion\PreparacionController@index',
	    'middleware' => ['permission:preparac-leer|preparac-crear|preparac-editar|preparac-borrar']
	])->name('preparac');
	Route::get('nuevo', [
	    'uses' => 'Produccion\PreparacionController@create',
	    'middleware' => ['permission:preparac-crear']
	])->name('preparac.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\PreparacionController@store',
	    'middleware' => ['permission:preparac-crear']
	])->name('preparac.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@edit',
	    'middleware' => ['permission:preparac-editar']
	])->name('preparac.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@update',
	    'middleware' => ['permission:preparac-editar']
	])->name('preparac.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@show',
	    'middleware' => ['permission:preparac-leer']
	])->name('preparac.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@destroy',
	    'middleware' => ['permission:preparac-borrar']
	])->name('preparac.borrar');
});
