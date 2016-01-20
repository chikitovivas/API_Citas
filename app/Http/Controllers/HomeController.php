<?php

namespace API_Medico\Http\Controllers;

use Illuminate\Http\Request;

use API_Medico\Http\Requests;
use API_Medico\Http\Controllers\Controller;
use Input;
use API_Medico\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "jejeps";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $user = new User;
        $user->fill(Input::all());
       /* $user->fill(array(
            "name" => "luis",
            "last_name" => "vivas",
            "username" => "elRey",
            "email" => "lsls@gmail.com",
            "password" => 123456,
            "identificacion" => "lj",
            ));*/
        $user->save(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return "jejeps";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         return 'jejeps';
    }

    public function loginIn()
    {

    // already logged in?
    if (\Auth::check())
    {
        return 'false';
    }

    $data = Input::all();
    $user = User::where('username', '=', $data['username'])->get();

    if($user[0]->password === $data['password']){
        Auth::loginUsingId($user[0]->id);
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

    public function logout()
    {
        Auth::logout();
    }

    public function get_log(){
        return response()->json(["user" => Auth::user()]);
    }
}
