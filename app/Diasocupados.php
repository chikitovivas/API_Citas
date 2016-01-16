<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

class Diasocupados extends Model {
	public $timestamps = false;
	protected $table = 'diasocupados';
	protected $fillable = 	[
								'diasOcupados'		
							];


}