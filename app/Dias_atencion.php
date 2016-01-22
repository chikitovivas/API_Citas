<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;
use DB;

class Dias_atencion extends Model
{

    public $timestamps = false;

    protected $table="dias_atencion";
	
	protected $fillable = 	[
								'lunes', 	
								'martes', 	
								'miercoles', 		
								'jueves', 	
								'viernes',				
								'sabado',	
								'domingo',
								'medicos_id'			
							];

	
    protected $dates = ['deleted_at'];	

    public static function getByMedico($id){
        $dias = DB::table('dias_atencion')
                ->select('dias_atencion.*')
                ->where('dias_atencion.medicos_id','=',$id)

                ->get();

        return $dias;        
    }
}
