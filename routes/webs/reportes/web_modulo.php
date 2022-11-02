<?php
$routexxx = 'excelxxx';
$controll = 'Reportes\Excelxxx\ExcelModulo';
Route::group(['prefix' => 'moduloexcel'], function () use ($routexxx, $controll) {
    Route::get('', [
		'uses' => $controll.'Controller@index',
		'middleware' => ['permission:'.$routexxx.'-moduloxx']
    ])->name($routexxx);
});

require_once('excelxxx/web_consmedi.php');
require_once('excelxxx/web_infoclin.php');
require_once('excelxxx/web_infopaci.php');
require_once('excelxxx/web_nutrelab.php');

