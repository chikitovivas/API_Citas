<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;
use DB;

class Horario extends Model
{
   protected $table = 'horario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['horainicio', 'horafin','idmedico'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public $timestamps = false;

    public static function getByMedico($id){
        $horario = DB::table('horario')
                ->select('horario.*')
                ->where('horario.idmedico','=',$id)

                ->get();

        return $horario;        
    }

}
