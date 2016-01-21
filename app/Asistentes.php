<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

class Asistentes extends Model
{
    public $timestamps = false;
	
    protected $table="asistente";
	
	protected $fillable = 	['identificaion'];

}
