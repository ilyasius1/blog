<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function registerPost(Request $request)
    {

    }

    public function login()
    {
        return view('pages.login');
    }

    public function loginPost()
    {

    }
}
