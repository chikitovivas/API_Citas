<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

class Patologias extends Model
{
    public $timestamps = false;
	
    protected $table="patologias";
	
	protected $fillable = 	['nombre'];
}
