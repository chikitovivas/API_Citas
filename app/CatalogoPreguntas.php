<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;
use DB;

class CatalogoPreguntas extends Model
{
    public $timestamps = false;
	
    protected $table="catalogopreguntas";
	
	protected $fillable = 	['pregunta','patologia'];

	public static function allRespuestas($id)
	{
		$respuestas = DB::table('catalogorespuestas')
					->select('*')
					->where('catalogorespuestas.pregunta','=',$id)

					->get();

		return $respuestas;			
	}

	public static function getAllbyPatologia($id)
	{
		$respuestas = DB::table('catalogopreguntas')
					->select('*')
					->where('catalogopreguntas.patologia','=',$id)

					->get();

		return $respuestas;			
	}

}
