<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register()
    {
        return view('layouts.secondary',[
            'page' => 'pages.register',
            'title' => 'Регистрация',
            'content' => '',
            'activemenu' => 'register',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $input = $request->all();
        debug($request->all());
        $user = new User;
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->password = $input['password'];
        $user->save();
        $profile = $user->profile()->create(['phone' => $input['phone']]);
        return 'ok';



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
