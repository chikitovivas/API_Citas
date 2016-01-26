<?php

namespace API_Medico\Http\Controllers;

use Illuminate\Http\Request;

use API_Medico\Http\Requests;
use API_Medico\Http\Controllers\Controller;

class EncuestasController extends Controller
{
    public allRespuestasCita($id)
    {
        $respuestas = Respuestas::allRespuestasByCita($id);

        
    }

}
