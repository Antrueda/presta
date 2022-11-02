<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

include_once('apis/clinica/api_clinica.php');
include_once('apis/medicame/api_medicame.php');
include_once('apis/medicame/api_unidad.php');
include_once('apis/dmedico/api_dmedico.php');
include_once('apis/administracion/api_admin.php');
include_once('apis/paciente/api_paciente.php');
require_once('apis/formulacion/api_cformula.php');
include_once('apis/roles/api_rol.php');
include_once('apis/reporte/api_reporte.php');
include_once('apis/produccion/api_produccion.php');
