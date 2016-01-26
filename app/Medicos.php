<?php

namespace API_Medico;

use Illuminate\Database\Eloquent\Model;

use DB;

class Medicos extends Model
{
         
    protected $table = 'medicos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identificacion', 'idasistente', 'especialidad', 'comparte', 'tiempoatencion'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public $timestamps = false;

    public static function citas($fecha,$id){
        $data = DB::table('citas')
            ->select('citas.id','citas.fecha', 'citas.hora', 'citas.motivo','pacientes.nombre', 'pacientes.apellido', 'pacientes.id as id_pa')
            ->where('citas.medicos','=', $id)
            ->where('citas.fecha', '=', $fecha)
            ->join('pacientes', 'citas.paciente', '=', 'pacientes.id')
            
            ->get();

        return $data;
    }

    public static function cita_fecha($fecha, $id)
    {
        $data = DB::table('citas')
            ->select('citas.*')
            ->where('citas.medicos','=', $id)
            ->where('citas.fecha', '=', $fecha)

            ->get();


        return $data;
    }

    public static function get_pacientes_citas($id){
        $data = DB::table('citas')
        	->distinct()
            ->select('pacientes.*')
            ->where('citas.medicos','=', $id)
            ->join('pacientes', 'citas.paciente', '=', 'pacientes.id')

            ->get();

        return $data;
    }
}
