<?php
$controll = 'Clinicas\SisClinica';
$routexxx = 'sisclini';
Route::group(['prefix' => 'clinica/{padrexxx}'], function () use ($routexxx, $controll) {
    Route::get('suscursales', [
        'uses' => $controll . 'Controller@index',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx);

    Route::get('listaxxx', [
        'uses' => $controll . 'Controller@getListado',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx . '.listaxxx');
    Route::get('nuevo', [
        'uses' => $controll . 'Controller@create',
        'middleware' => ['permission:' . $routexxx . '-crear']
    ])->name($routexxx . '.nuevo');
});
Route::group(['prefix' => 'sucursal'], function () use ($routexxx, $controll) {
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
        'uses' => $controll . 'Controller@inactivate',
        'middleware' => ['permission:' . $routexxx . '-borrar']
    ])->name($routexxx . '.borrar');

    Route::put('borrar/{objetoxx}', [
        'uses' => $controll . 'Controller@destroy',
        'middleware' => ['permission:' . $routexxx . '-borrar']
    ])->name($routexxx . '.borrar');
    Route::get('municipi', [
        'uses' => $controll . 'Controller@getMunicipio',
        'middleware' => ['permission:' . $routexxx . '-leer']
    ])->name($routexxx . '.municipi');


});
require_once('web_cmedicame.php');
    require_once('web_crango.php');
    require_once('web_paciente.php');
    require_once('web_remision.php');
