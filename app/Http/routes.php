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

/*************************************************** HomeController *************************************************/
/*---------------GET-----------------------*/
/*---------------POST-----------------------*/


/*************************************************** CitasController *************************************************/
Route::resource('Citas','CitasController');
/*---------------GET-----------------------*/
Route::get('Citas/porCedula/{id}','CitasController@citaPorCedula');
Route::get('Citas/porFecha/{fecha}','CitasController@CitaPorFecha');
Route::get('Diasocupados/diasOcupados','CitasController@diasOcupados');
/*---------------POST-----------------------*/
Route::post('Diasocupados/insertarfecha','CitasController@insertarFechaOcupada');
Route::post('Citas/insertarCita','CitasController@insertarCita');


/*************************************************** PacientesController *************************************************/
Route::resource('Pacientes','PacientesController');
/*---------------GET-----------------------*/
Route::get('Pacientes/porId/{id}','PacientesController@findById');
/*---------------POST-----------------------*/


/*************************************************** MedicosController *************************************************/
Route::resource('Medicos','MedicosController');
/*---------------GET-----------------------*/
Route::get('Citas/{id}/doctor','MedicosController@citas');
/*---------------POST-----------------------*/


/*************************************************** AsistentesController *************************************************/
Route::resource('Asistentes','AsistentesController');
/*---------------GET-----------------------*/
/*---------------POST-----------------------*/