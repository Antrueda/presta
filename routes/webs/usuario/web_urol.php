<?php

$controll = 'Usuario\Urol';
$routexxx = 'uroles';
Route::group(['prefix' => 'uroles'], function () use ($controll, $routexxx) {


    Route::get('listaxxx', [
		'uses' => $controll . 'Controller@getListado',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx.'.listaxxx');

    Route::get('asignarol', [
		'uses' => $controll . 'Controller@getAsignaRol',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx.'.asignarol');
});
Route::group(['prefix' => '{padrexxx}'], function () use ($controll, $routexxx) {

	Route::get('uroles', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx);

    Route::get('listarol', [
		'uses' => $controll . 'Controller@getListadoRoles',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx.'.listarol');

});





