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
/*************************************************** AuthController *************************************************/
//Route::resource('Auth','AuthController');
/*---------------GET-----------------------*/

/*---------------POST-----------------------*/


/*************************************************** HomeController *************************************************/
Route::resource('Home','HomeController');
/*---------------GET-----------------------*/
Route::get('/get_user','HomeController@get_log'); /* Herrera, medico logeado */
Route::get('/logout','HomeController@logout'); // logout
/*---------------POST-----------------------*/
Route::any('/login','HomeController@loginIn'); // login


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
Route::get('Citas/{id}/doctor','MedicosController@citas');	//Herrera, citas de un medico
Route::get('Citas/{id}/get_CPacientes','MedicosController@get_Pacientes_Citas'); //Herrera, pacientes de citas Medico
/*---------------POST-----------------------*/


/*************************************************** AsistentesController *************************************************/
Route::resource('Asistentes','AsistentesController');
/*---------------GET-----------------------*/
/*---------------POST-----------------------*/