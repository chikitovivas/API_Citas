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
        $respuestas = ["hola"=>""];
        $respuestas2 = ["chao"=>""];

       /* $data = "";

        foreach ($patologias as $patologia) {

            $respuesta = CatalogoPreguntas::getAllbyPatologia($patologia->id);

            $data = 


        }*/
            
        $data = array_merge($respuestas);

        $data = array_merge($respuestas2);

        return response()->json($data); 
    }   
}
