<?php

namespace API_Medico\Http\Controllers;

use Illuminate\Http\Request;

use API_Medico\Http\Requests;
use API_Medico\Http\Controllers\Controller;
use API_Medico\Respuestas;
use API_Medico\CatalogoPreguntas;
use Input;
use API_Medico\Patologias;

class EncuestasController extends Controller
{
    public function allRespuestasCita($id)
    {
        $respuestas = Respuestas::allRespuestasByCita($id);

        return response()->json($respuestas);

    }

    public function CatalogoP_Respuestas($id)
    {
        $respuestas = CatalogoPreguntas::allRespuestas($id);

        return response()->json($respuestas);        
    }

    public function createRespuestasCita()
    {
        $data = Input::all();

        foreach($data as $respuesta)
        {
            $resp = new Respuestas;

            $resp->fill($respuesta);

            $resp->save();
        }
    }

    public function saveRespuestasCita()
    {
        $data = Input::all();

        foreach($data as $respuesta)
        {
            $resp = Respuestas::find($respuesta);

            $resp->fill($respuesta);

            $resp->save();
        }
    } 

    public function PreguntasPatologias()
    {
        $patologias = Patologias::all();

        foreach ($patologias as $patologia) {

            $respuesta = CatalogoPreguntas::getAllbyPatologia($patologia->id);

            $respuesta = [$patologia->nombre => $respuesta];
            if($patologia->id === 1){
                $data = $respuesta;
            }else{
                $data = array_merge($data,$respuesta);
            }   
        }

        return response()->json($data); 
    }

    public function createPreguntas()
    {
        $data = Input::all();

        $pregunta =  new CatalogoPreguntas;
        $pregunta->fill($data);
        $pregunta->save();
    }  

    public function createCrespuestas(){
        $data = Input::all();

        $respuesta =  new CatalogoRespuestas;
        $respuesta->fill($data);
        $respuesta->save();        
    }

    public function createPatologia()
    {
        $data = Input::all();

        $patologia =  new Patologias;
        $patologia->fill($data);
        $patologia->save();  
    }
}
