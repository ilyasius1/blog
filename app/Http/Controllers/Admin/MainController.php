<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.pages.main',[
            'title' => 'Главная админская хрень',
            'activemenu' => 'admin'
        ]);
    }


    public function about()
    {
        return 'about admin';
    }

    public function editAbout()
    {
        return 'admin edit about';
    }

    public function editAboutPost()
    {
        return 'admin about edited';
    }
}
