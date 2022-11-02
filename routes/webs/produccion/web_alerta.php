<?php
$controll = 'Produccion\Alerta';
$routexxx = 'alerta';
Route::group(['prefix' => 'alertas'], function () use ($controll, $routexxx) {

    Route::get('', [
        'uses' => $controll . 'Controller@create',
        'middleware' => ['permission:' .
            $routexxx . '-cliente|' .
            $routexxx . '-revisar|' .
            $routexxx . '-preparar|' .
            $routexxx . '-procesar|' .
            $routexxx . '-terminar']
    ])->name($routexxx);

    Route::post('crear', [
		'uses' => $controll . 'Controller@store',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.crear');
});
