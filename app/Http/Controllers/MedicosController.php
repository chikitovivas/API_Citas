<?php

namespace API_Medico\Http\Controllers;

use Illuminate\Http\Request;

use API_Medico\Http\Requests;
use API_Medico\Http\Controllers\Controller;

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
    
    public function citas($id)
    {

        $data = DB::table('citas')
                    ->select('citas.id','citas.fecha', 'citas.hora', 'citas.motivo','pacientes.nombre', 'pacientes.apellido', 'pacientes.id as id_pa')
                    ->where('citas.medicos','=', 1)
                    ->join('pacientes', 'citas.paciente', '=', 'pacientes.id')
                    
                    ->get();

        return $data;
    } 
}
