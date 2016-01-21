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
//Route::resource('Home','HomeController');
/*---------------GET-----------------------*/
Route::get('/get_user','HomeController@get_log'); /* Herrera, datos del medico o asistente logeado */
Route::get('/logout','HomeController@logout'); // logout
/*---------------POST-----------------------*/
Route::any('/login','HomeController@loginIn'); // login
Route::any('/create','HomeController@create'); // create


/*************************************************** CitasController *************************************************/
Route::resource('Citas','CitasController');
/*---------------GET-----------------------*/
Route::get('Citas/porCedula/{id}','CitasController@citaPorCedula'); // todas las citas por una cedula paciente
Route::get('Citas/porFecha/{fecha}/{username}','CitasController@CitaPorFecha'); // todas las citas de una fecha/username
Route::get('Diasocupados/diasOcupados','CitasController@diasOcupados'); //
/*---------------POST-----------------------*/
Route::post('Diasocupados/insertarfecha','CitasController@insertarFechaOcupada'); //
Route::post('Citas/insertarCita','CitasController@insertarCita'); //insertar cita


/*************************************************** PacientesController *************************************************/
Route::resource('Pacientes','PacientesController');
/*---------------GET-----------------------*/
Route::get('Pacientes/porId/{id}','PacientesController@findById');	//Herrera, encontrar paciente por id
Route::get('Pacientes/historias/{id}/{username}','PacientesController@citas'); // Herrera, todas las citas de un paciente por id /username
/*---------------POST-----------------------*/


/*************************************************** MedicosController *************************************************/
Route::resource('Medicos','MedicosController');
/*---------------GET-----------------------*/
Route::get('Citas/{username}/doctor','MedicosController@citas');	//Herrera, citas de un medico /username
Route::get('Citas/{username}/get_CPacientes','MedicosController@get_Pacientes_Citas'); //Herrera, pacientes de citas Medico /username
/*---------------POST-----------------------*/


/*************************************************** AsistentesController *************************************************/
Route::resource('Asistentes','AsistentesController');
/*---------------GET-----------------------*/
/*---------------POST-----------------------*/