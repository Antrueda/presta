<?php
$routexxx='consmedi';
$controll='Reportes\Excelxxx\ConsumoMedicamento';
Route::group(['prefix' => 'consmedi'], function () use($routexxx,$controll){
    Route::get('', [
		'uses' => $controll.'Controller@create',
		'middleware' => ['permission:'.$routexxx.'-leerxxxx|']
    ])->name($routexxx);

    Route::post('nuevo', [
		'uses' => $controll.'Controller@store',
		'middleware' => ['permission:'.$routexxx.'-imprimir']
	])->name($routexxx.'.crear');
});
