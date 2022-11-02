<?php

$controll = 'Usuario\Rpermiso';
$routexxx = 'rpermiso';
Route::group(['prefix' => '{rpermisos}'], function () use ($controll, $routexxx) {

	Route::get('rpermisos', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx);

});