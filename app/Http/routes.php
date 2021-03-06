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
Route::get('/get_user/{username}','HomeController@get_log'); /* Herrera, datos del medico o asistente logeado //username */ 
Route::get('/logout','HomeController@logout'); // logout
/*---------------POST-----------------------*/
Route::any('/login','HomeController@loginIn'); // login
Route::any('/create','HomeController@create'); // create
Route::any('/edit/{username}','HomeController@edit'); // edit //username


/*************************************************** CitasController *************************************************/
//Route::resource('Citas','CitasController');
/*---------------GET-----------------------*/
Route::get('Citas/porCedula/{id}','CitasController@citaPorCedula'); // todas las citas por una cedula paciente
Route::get('Citas/porFecha/{fecha}/{username}','CitasController@CitaPorFecha'); // todas las citas de una fecha/username
Route::get('Diasocupados/diasOcupados','CitasController@diasOcupados'); //
Route::get('Citas/all/{username}','CitasController@all'); // Todas las citas de un medico
Route::get('Citas/delete/{id}','CitasController@destroy');

/*---------------POST-----------------------*/
Route::post('Diasocupados/insertarfecha','CitasController@insertarFechaOcupada'); //
Route::post('Citas/insertarCita','CitasController@insertarCita'); //insertar cita
Route::any('Citas/create','CitasController@create'); // create
Route::any('Citas/edit/{id}','CitasController@edit'); // edit


/*************************************************** PacientesController *************************************************/
Route::resource('Pacientes','PacientesController');
/*---------------GET-----------------------*/
Route::get('Pacientes/porId/{id}','PacientesController@findById');	//Herrera, encontrar paciente por id
Route::get('Pacientes/porCedula/{cedula}','PacientesController@findByCedula');	//Boscan, encontrar paciente por cedula
Route::get('Pacientes/historias/{id}/{username}','PacientesController@citas'); // Herrera, todas las citas de un paciente por id /username
Route::post('Pacientes/create','PacientesController@create');
/*---------------POST-----------------------*/
Route::any('Pacientes/create','PacientesController@create'); //Lino, crear paciente retornando id


/*************************************************** MedicosController *************************************************/
//Route::resource('Medicos','MedicosController');
/*---------------GET-----------------------*/
Route::get('Medicos/cita/{fecha}/{username}','MedicosController@citas');	//Herrera, citas de un medico /username
Route::get('Medicos/get_CPacientes/{username}','MedicosController@get_Pacientes_Citas'); //Herrera,Boscan, pacientes de todas las citas de un medico /username
Route::get('MedicosController/configuracion/{username}','MedicosController@getConfiguracion'); //yanir, get configuracion /username

/*---------------POST-----------------------*/
Route::any('Medicos/edit/{username}','MedicosController@edit'); //yanir, editar configuracion /username

/*************************************************** AsistentesController *************************************************/
//Route::resource('Asistentes','AsistentesController');
/*---------------GET-----------------------*/
Route::get('Asistentes/all','AsistentesController@findAll');
/*---------------POST-----------------------*/
/*************************************************** EncuestasController *************************************************/
/*---------------GET-----------------------*/
Route::get('Encuestas/all/{id}','EncuestasController@allRespuestasCita');	//Boscan, Todas las respuesta de una cita
Route::get('CatalogoP/respuestas/{id}','EncuestasController@CatalogoP_Respuestas');	//Boscsan, posibles catalogorespuestas de un catalogo pregunta
Route::get('Preguntas/patologias','EncuestasController@PreguntasPatologias');	//Boscsan, preguntas de todas las patologias


/*---------------POST-----------------------*/
Route::any('Citas/respuestas','EncuestasController@createRespuestasCita');	//Boscan, crear registros respuestas de una cita
Route::post('Preguntas/create','EncuestasController@createPreguntas');	//Boscan, crear Catalogo preguntas 
Route::post('Respuestas/create','EncuestasController@createCrespuestas');	//Boscan, crear Catalogo respuestas 
Route::post('patologias/create','EncuestasController@createPatologia');	//Boscan, crear Catalogo respuestas 

