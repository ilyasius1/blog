<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = [
            [
                'id' => '1',
                'title' => 'Number 1',
                'subtitle' => 'Подзаголовок1',
                'content' => 'Content 1',
                'img' => 'assets/images/dummy-licensed/blog-image.jpg'
            ],
            [
                'id' => '2',
                'title' => 'Number 2',
                'subtitle' => 'Подзаголовок2',
                'content' => 'Content 2',
                'img' => 'assets/images/dummy-licensed/blog-image.jpg'
            ],
            [
                'id' => '3',
                'title' => 'Number 3',
                'subtitle' => 'Подзаголовок3',
                'content' => 'Content 3'
            ]
        ];
        return 'admin';//view('admin.pages.main',['title' => 'Главная админская хрень', 'articles' => $articles]);
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
