<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pacientes extends Model
{
	public $timestamps = false;
	
    protected $table="pacientes";
	
	protected $fillable = 	[
								'cedula', 	
								'nombre', 	
								'apellido', 		
								'direccion', 	
								'correo',				
								'tlfncasa',		
								'tlfncelular',		
							];


	public static function findById($id)
	{
	    $paciente = DB::table('pacientes')
	    ->select('*')
	    ->where('id', '=', $id)
	    ->get();

		return $paciente;    
	}

	public static function findByCedula($cedula)
	{
	    $paciente = DB::table('pacientes')
	    ->select('*')
	    ->where('cedula', '=', $cedula)
	    ->get();

		return $paciente;    
	}

	public static function allCitas($id,$user) //Todas las citas
	{
	        $data = DB::table('citas')
	            ->select('citas.*')
	            ->where('citas.medicos', '=', $user)
	            ->where('citas.paciente','=',$id)

	            ->get();
	        return $data;
	}
	
	public static function pacientesByid($id) //Todos los pacientes de un medico
	{
	        $data = DB::table('citas')
	        	->distinct()
	            ->select('pacientes.*')
	            ->where('citas.medicos', '=', $id)
	            ->join('pacientes','pacientes.id','=','citas.paciente')



	            ->get();
	        return $data;
	}

}