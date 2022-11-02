<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::get('user-list-pdf/{objetoxx}', 'Pdfs\PdfController@getPdfExpUsuarios')->name('user.pdf');
$optionsx = ['regiester' => false];
Auth::routes($optionsx);
Route::group(['middleware' => ['guest']], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@Login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['polidato']], function () {
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        include_once('webs/awebs.php');
    });
    Route::get('usuarios/polidato/{objetoxx}', [
        'uses' => 'Usuario\UsuarioController@polidatoe',
        'middleware' => 'polidato'
    ])->name('usuarios.polidato');
});

