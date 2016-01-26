<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

class CatalogoPreguntas extends Model
{
    public $timestamps = false;
	
    protected $table="catalogopreguntas";
	
	protected $fillable = 	['pregunta','patologia'];
}
