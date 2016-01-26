<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

class CatalogoRespuestas extends Model
{
    public $timestamps = false;
	
    protected $table="catalogorespuestas";
	
	protected $fillable = 	['titulo','pregunta'];
}
