<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register()
    {
        return view(/*'.pages.register', [*/'layouts.secondary',[
            'page' => 'pages.register',
            'title' => 'Регистрация',
            'content' => '',
            'activemenu' => 'register',
        ]);
    }

    public function registerPost(RegisterRequest $request)
    {
        /*$this->validate($request, [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',//|unique:users',
            'password' => 'required|min:6|max:255',
            'password2' => 'required|same:password',
            'phone' => 'regex:/\d{11}/',//'regex:/\+\d{1}\s{1}\(\d{3}\)\s{1}\d{3}\-\d{2}\-\d{2}/',
            'is_confirmed' => 'accepted'
        ]);*/
        /*
 array:7 [
  "_token" => "bqsaavCCrNVmENwtFJbvteCv1kqDUr3GOTH56iWi"
  "email" => "eaer@fasdf"
  "password" => "123123"
  "password2" => "123123"
  "name" => "asdfasdfa"
  "phone" => "11112223333"
  "is_confirmed" => "on"
]
         */

        $input = $request->all();
        $id = DB::table('users')->insertGetId([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'phone' => trim(str_replace(['+', ' ', '(', ')', '-'], '', $input['phone']))
        ]);
        debug($request->all());

        return 'id: ' . $id;

    }

    public function login()
    {
        return view('layouts.secondary',[
            'page' => 'pages.login',
            'title' => 'Вход',
            'content' => '',
            'activemenu' => 'login',
        ]);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
        debug($credentials);
        if(Auth::attempt($credentials)){
            dump($request->all());
            debug($request->all());
            debug(Auth::attempt($credentials));
            return 'ok';
            //return redirect()->intended();
        }
        else {
            dump($request->all());
            debug($request->all());
            debug(Auth::attempt($credentials));
            return 'failed';
        }
    }

    public function resetPassword()
    {

    }
}
