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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/Acogido','AcogidosController');
Route::get('/Acogido/{Acogido}/modulos','AcogidosController@modulos')->name('Acogido.modulos');
Route::get('/Acogido/{Acogido}/modulos/{Modulo}','AcogidosController@modulos_datos')->name('Acogido.modulos.datos');
Route::post('/Acogido/{Acogido}/modulos/{Modulo}','AcogidosController@update_datos')->name('Acogido.modulos.datos.update');
