<?php

namespace API_Medico\Http\Controllers\Auth;

use API_Medico\User;
use Validator;
use API_Medico\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login()
    {

  /*  // already logged in?
    if (\Auth::check())
    {
        \Messages::info(__('login.already-logged-in'));
        \Response::redirect_back('dashboard');
    }*/

    $data = Input::all();
    $user = User::where('username', '=', $data['username'])->get();

    if($user[0]->password === $data['password']){
        //Auth::login($user);
        return 'true';
    }
    return 'false';


      /*  // was the login form posted?
        if (\Input::method() == 'POST')
        {
            // check the credentials.
            if (\Auth::instance()->login(\Input::param('username'), \Input::param('password')))
            {
                // logged in, go back to the page the user came from, or the
                // application dashboard if no previous page can be detected
                 return response()->json(["login" => true]);
            }
            else
            {
                // login failed, show an error message
                 return response()->json(["login" => false]);
            }
        }*/
    }


}
