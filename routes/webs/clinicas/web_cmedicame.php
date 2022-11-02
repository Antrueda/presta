<?php

$controll = 'Clinicas\Cmedicame';
$routexxx = 'cmedicame';

Route::group(['prefix' => 'sucursal/{padrexxx}'], function () use ($routexxx, $controll) {
    Route::get('medicamentos', [
        'uses' => $controll . 'Controller@index',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx);

    Route::get('asignado', [
        'uses' => $controll . 'Controller@getAsignado',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx . '.asignado');
    Route::get('asignar', [
        'uses' => $controll . 'Controller@getAsignar',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx . '.asignar');
});

Route::group(['prefix' => 'medicamento'], function () use ($controll, $routexxx) {
	Route::get('inactivar', [
		'uses' => $controll . 'Controller@getInactivarMedicam',
		'middleware' => ['permission:' . $routexxx . '-crear|'. $routexxx . '-editar|']
    ])->name($routexxx . '.inactivar');
    Route::get('asignarmedi', [
		'uses' => $controll . 'Controller@getAsignarMedicame',
		'middleware' => ['permission:' . $routexxx . '-crear|'. $routexxx . '-editar|']
	])->name($routexxx . '.asignarmedi');
});
