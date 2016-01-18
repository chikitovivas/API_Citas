<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Citas','CitasController');
Route::get('Citas/porCedula/{id}','CitasController@citaPorCedula');
Route::get('Citas/porFecha/{fecha}','CitasController@CitaPorFecha');
Route::get('Pacientes/porId/{id}','CitasController@pacientePorId');
Route::post('Diasocupados/insertarfecha','CitasController@insertarFechaOcupada');
Route::get('Diasocupados/diasOcupados','CitasController@diasOcupados');
Route::post('Pacientes/insertarPaciente','CitasController@insertarPaciente');
Route::post('Citas/insertarCita','CitasController@insertarCita');