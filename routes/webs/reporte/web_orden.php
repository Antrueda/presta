<?php
$controll = 'Reporte\Orden';
$routexxx = 'ordprodu';
Route::group(['prefix' => 'ordenes'], function() use($routexxx,$controll) {
	Route::get('', [
	    'uses' => $controll.'Controller@index',
	    'middleware' => ['permission:ordprodu-leer|ordprodu-crear|ordprodu-editar|ordprodu-borrar']
	])->name($routexxx);
	Route::get('nuevo', [
	    'uses' => $controll.'Controller@create',
	    'middleware' => ['permission:ordprodu-crear']
    ])->name($routexxx.'.nuevo');
    Route::get('listaxxx', [
	    'uses' => $controll.'Controller@getOrdenes',
	    'middleware' => ['permission:ordprodu-leer']
    ])->name($routexxx.'.listaxxx');

    Route::get('imprimir/{ordenxxx}', [
	    'uses' => $controll.'Controller@getImprimirOrden',
	    'middleware' => ['permission:ordprodu-leer']
    ])->name($routexxx.'.imprimir');


	Route::post('crear', [
	    'uses' => $controll.'Controller@store',
	    'middleware' => ['permission:ordprodu-crear']
	])->name($routexxx.'.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => $controll.'Controller@edit',
	    'middleware' => ['permission:ordprodu-editar']
	])->name($routexxx.'.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => $controll.'Controller@update',
	    'middleware' => ['permission:ordprodu-editar']
	])->name($routexxx.'.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => $controll.'Controller@show',
	    'middleware' => ['permission:ordprodu-leer']
	])->name($routexxx.'.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => $controll.'Controller@destroy',
	    'middleware' => ['permission:ordprodu-borrar']
	])->name($routexxx.'.borrar');
});
