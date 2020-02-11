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




 Route::post('/cerrar', 'AuthController@logout')->name('cerrar');;

Route::post('/iniciar', 'AuthController@iniciar')->name('/iniciar');

Route::post('/signup',  'AuthController@signup')->name('/signup');


Auth::routes();

Route::get('/home', 'FrontController@home')->name('/home');
Route::get('/Auth.login', 'FrontController@index')->name('/Auth.login');
Route::get('/principal', 'FrontController@principal')->name('/principal');
Route::get('/inicio', 'FrontController@inicio')->name('/inicio');
Route::resource('usuarios', 'UserController')->middleware('auth');
Route::resource('grupos', 'GrupoController');
Route::resource('modalidades', 'ModalidadController');
Route::resource('modulos', 'ModuloController');
Route::resource('prematriculas', 'PrematriculaController');
Route::post('/encargado', 'EncargadoController@encargado')->name('/encargado');














