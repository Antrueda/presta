<?php
$controll = 'Reporte\Reporte';
$routexxx = 'reportes';
Route::group(['prefix' => $routexxx], function () use ($controll, $routexxx) {

    Route::get('', [
        'uses' => $controll . 'Controller@index',
        'middleware' => ['permission:' . $routexxx . '-modulo']
    ])->name($routexxx);
  
  });
