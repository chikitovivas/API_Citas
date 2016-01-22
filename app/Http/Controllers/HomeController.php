<?php

namespace API_Medico\Http\Controllers;

use Illuminate\Http\Request;

use API_Medico\Http\Requests;
use API_Medico\Http\Controllers\Controller;
use Input;
use API_Medico\User;
use API_Medico\Medicos;
use API_Medico\Asistentes;
use API_Medico\Horario;
use API_Medico\Dias_atencion;
use Auth;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "jejeps";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $data = Input::all();
        /*$data = array('username'=>'nuevo1','identificacion'=>'nuevo1','email'=>'nuevo1','asistente'=>'elRey', 'horainicio'=>'20000','horafin'=>'50000',
            'lunes'=>true,'martes'=>true,'miercoles'=>true,'jueves'=>true, 'viernes'=>false,'sabado'=>false, 'domingo'=>false, 'medico'=>true);*/
        $user = new User;
        $user->fill($data);
        $user->save();

        if($data['medico']){
            $horario = new Horario;
            $dia = new Dias_atencion;
            $medico = new Medicos;

            $medico->fill($data);
            $asistente = User::findByUsername($data['asistente']);
            $asistente = Asistentes::where('identificacion', '=', $asistente[0]->identificacion)->get();
            $medico->fill(array('identificacion' => $user->identificacion, 'idasistente' => $asistente[0]->id));
            $medico->save();


            $horario->fill($data);
            $horario->fill(array('idmedico' => $medico->id));

            $dia->fill($data);
            $dia->fill(array('medicos_id' => $medico->id));



            $horario->save();
            $dia->save();
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return "jejeps";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::findByUsername($username);
        $data = Input::all();
        $user = $user[0];

        if(User::isMedico($user->identificacion)){
            $medico = Medicos::where('identificacion', '=', $user->identificacion)->get();
            $medico = $medico[0];

            $user->fill($data);
            $medico->fill($data);

            $user->save();
            $medico->save();
            
        }else{
            $user->fill($data);
            $user->save();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         return 'jejeps';
    }

    public function loginIn()
    {
<<<<<<< HEAD

    // already logged in?
    if (\Auth::check())
    {
        return '-false';
    }


    //$user = User::findByUsername('mboscan');


    $data = Input::all();
    $user = User::findByUsername($data['username']);

    
    if($user){
        if($user[0]->password ===  $data['password']){

        //if($user[0]->password ===  '1234'){
            Auth::loginUsingId($user[0]->id);
            return '-true';
        }
        return '-false';        
    }
    return '-false';



      /*  // was the login form posted?
        if (\Input::method() == 'POST')
        {
            // check the credentials.
            if (\Auth::instance()->login(\Input::param('username'), \Input::param('password')))
            {
                // logged in, go back to the page the user came from, or the
                // application dashboard if no previous page can be detected
                 return response()->json(["login" => true]);
            }
            else
            {
                // login failed, show an error message
                 return response()->json(["login" => false]);
=======
        $user = User::findByUsername('chikito');
        $data = Input::all();
        //$user = User::findByUsername($data['username']);

        
        if($user){
            //if($user[0]->password ===  $data['password']){
            if($user[0]->password ===  '23503034'){
                Auth::loginUsingId($user[0]->id);
                return '-true';
>>>>>>> 98549789fd73b7cba7b1cea0584cb27569d78f28
            }
            return '-false';        
        }
        return '-false';
    }

    public function logout()
    {
        Auth::logout();
    }

    public function get_log($username){

        $user = User::findByUsername($username);

        if(User::isMedico($user[0]->identificacion)){
            $medico = Medicos::where('identificacion', '=', $user[0]->identificacion)->get();

           // $horario = Horario::where('idmedico', '=', $user->id);

            return response()->json(["user" => $user[0], "medico" => $medico[0]]);
        }else{
            $asistentes = Asistentes::where('identificacion', '=', $user[0]->identificacion)->get();

           // $horario = Horario::where('idmedico', '=', $user->id);

            return response()->json(["user" => $user[0], "asistentes" => $asistentes[0]]);
        }


    }
}
