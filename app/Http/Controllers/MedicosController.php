<?php

namespace API_Medico\Http\Controllers;

use Illuminate\Http\Request;

use API_Medico\Http\Requests;
use API_Medico\Http\Controllers\Controller;
use API_Medico\Medicos;
use API_Medico\User;
use API_Medico\Pacientes;
use API_Medico\Horario;
use API_Medico\Dias_atencion;
use Input;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Input::all();
        $medico = User::findIdByUsername($username);

        $medico = Medicos::find($medico[0]->id);
        $horario_ = Horario::getByMedico($medico->id);
        $dias_ = Dias_atencion::getByMedico($medico->id);

        $horario = Horario::find($horario_[0]->id);
        $dias = Dias_atencion::find($dias_[0]->id);

        $medico->fill($data);
        $horario->fill($data);
        $dias->fill($data);

        $medico->save();
        $horario->save();
        $dias->save();
        
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
        //
    }
    
    public function citas($fecha,$username)
    {
        $id = User::findIdByUsername($username);

        $data = Medicos::citas($fecha,$id[0]->id);

        return response()->json(["citas" => $data]);
    } 

    public function get_Pacientes_Citas($username)
    {
        $id = User::findIdByUsername($username);

        $data = Medicos::get_pacientes_citas($id[0]->id);

        return response()->json(["pacientes" => $data]);
    }

    public function getConfiguracion($username){
        $medico = User::findIdByUsername($username);

        $medico = Medicos::find($medico[0]->id);
        $horario = Horario::getByMedico($medico->id);
        $dias = Dias_atencion::getByMedico($medico->id);

        return response()->json(["medico" => $medico, "horario" => $horario, "dias" => $dias]);
    }
}
