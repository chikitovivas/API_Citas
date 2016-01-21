<?php

namespace API_Medico;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','last_name','username','tlf', 'email', 'password', 'identificacion', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public $timestamps = false;

    public static function isMedico($identificacion){

        if(DB::table('medicos')->where('medicos.identificacion','=',$identificacion)->get() === []){
            return false;
        }else{
            return true;
        }
    }

    public static function findByUsername($username){
        if(DB::table('users')->where('users.username', '=', $username)->get() === []){
            return false;
        }else{
            return User::where('username', '=', $username)->get();
        }
    }

}
