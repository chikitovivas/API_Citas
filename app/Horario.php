<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
   protected $table = 'horario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['horainicio', 'horafin', 'dia'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}
