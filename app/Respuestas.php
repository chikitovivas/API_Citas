<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;
use DB;

class Respuestas extends Model
{
    public $timestamps = false;
	
    protected $table="respuestas";
	
	protected $fillable = 	['pregunta','respuesta','seleccion','cita'];


	public static function allRespuestasByCita($id){
		$respuestas = DB::table('respuestas')
					->select('*')
					->where('respuestas.cita','=',$id)

					->get();

		return $respuestas;				
	}
}
