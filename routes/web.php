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
});

Route::get('/mantenimientos/servir', ['uses' => 'Comensal_Controller@ver_servir', 'as' => 'comensal.servir']);

Route::group(['prefix'=>'mantenimientos/'], function () {

    Route::resource('cliente','\App\Http\Controllers\Cliente_Controller');

    Route::get('comensal/listar', ['uses' => 'Comensal_Controller@listar', 'as' => 'comensal.listar']);

    Route::get('comensal/buscar', ['uses' => 'Comensal_Controller@buscar', 'as' => 'comensal.buscar']);

    Route::resource('comensal','\App\Http\Controllers\Comensal_Controller');

    Route::get('menu/listar', ['uses' => 'Menu_Controller@listar', 'as' => 'menu.listar']);

    Route::resource('menu','\App\Http\Controllers\Menu_Controller');

    Route::get('huellas', ['middleware' => 'cors', function()
    {
        return \Response::json(\App\Comensal::get(['id', 'huella1 as huella']));
    }]);

});
