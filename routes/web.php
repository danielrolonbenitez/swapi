<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[
    'as' => 'home',
    'uses' => 'ApiInventarioController@index'
]);



Route::get('/ver-naves',[
    'as' => 'naves',
    'uses' => 'ApiInventarioController@verNaves'
]);

Route::get('/ver-vehiculos',[
    'as' => 'vehiculos',
    'uses' => 'ApiInventarioController@verVehiculos'
]);


Route::any('ajax/buscar',[
    'as' => 'buscar',
    'uses' => 'ApiInventarioController@buscarTransporte'
]);

Route::any('ajax/agregar-transporte',[
    'as' => 'agregar',
    'uses' => 'ApiInventarioController@agregarTransporte'
]);

Route::any('ajax/eliminar-transporte',[
    'as' => 'eliminar',
    'uses' => 'ApiInventarioController@eliminarTransporte'
]);


Route::get('/importar',[
    'as' => 'importar',
    'uses' => 'ApiInventarioController@importarDatosApi'
]);