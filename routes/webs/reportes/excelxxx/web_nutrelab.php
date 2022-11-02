<?php
$routexxx='nutrelab';
$controll='Reportes\Excelxxx\NutricionElaborada';
Route::group(['prefix' => 'nutrelab'], function () use($routexxx,$controll){
    Route::get('', [
		'uses' => $controll.'Controller@create',
		'middleware' => ['permission:'.$routexxx.'-leerxxxx|']
    ])->name($routexxx);

    Route::post('nuevo', [
		'uses' => $controll.'Controller@store',
		'middleware' => ['permission:'.$routexxx.'-imprimir']
	])->name($routexxx.'.crear');
});
