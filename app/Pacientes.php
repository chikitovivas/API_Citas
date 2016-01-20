<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

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
}

public static function findById($id)
{
    $paciente = DB::table('pacientes')
    ->select('*')
    ->where('id', '=', $id)
    ->get();

	return $paciente;    
}

public static function allHistory()
{
	$historias ;

}