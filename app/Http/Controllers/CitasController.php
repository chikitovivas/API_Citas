<?php

namespace API_Medico\Http\Controllers;

use Illuminate\Http\Request;

use API_Medico\Http\Requests;
use API_Medico\Http\Controllers\Controller;
use API_Medico\Citas;
use API_Medico\Pacientes;
use API_Medico\Diasocupados;
use Input;
use DB;

class CitasController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only' => ['show','update','destroy']]);
    }

    public function find(Route $route){
        $this->note = Citas::find($route->getParameter('Citas'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Citas::all();
        return response()->json($citas->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citas = new Citas;

        $citas->fill(Input::all());
        
        $citas->save();    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Citas::create($request->all());
        return response()->json(["mensaje" => "creado correctamente"]);
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
    public function edit($id)
    {
        //
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


/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
 **/
    public function citaPorCedula($id)
    {
        //


        $datos['nombre'];
        $paciente = Pacientes::where('pacientes.cedula','=','23503033')->get();

        $cita = Citas::where('citas.paciente','=',$paciente[0]->id)->get();

        return response()->json(["citas" => $cita,"paciente" => $paciente]);

     //Eloquent orm

    }

/*
    public function citaPorCedula($id)
    {
        


        $datos['nombre'];
        $paciente = Pacientes::where('pacientes.cedula','=','23503033')->get();

        $cita = Citas::where('citas.paciente','=',$paciente[0]->id)->get();

        return response()->json(["citas" => $cita,"paciente" => $paciente]);
    }

*/

        public function pacientePorId($id)
    {
        //

        $paciente = DB::table('pacientes')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        

        return response()->json($paciente);

     //Eloquent orm

    }
   




public function CitaPorFecha($fecha)
    {
        //
        $citas = DB::table('citas')
            ->select('*')
            ->where('fecha', '=', $fecha)
            ->get();


        return response()->json($citas);

     //Eloquent orm

    }



public function insertarFechaOcupada()
{

    $diasocupados = new Diasocupados;
    $diasocupados->fill(Input::all());
    $diasocupados->save(); 


}


}
