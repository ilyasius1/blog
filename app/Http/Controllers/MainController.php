<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
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
    return view('pages.main', ['title' => 'Главная хрень', 'articles' => $articles]);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'Обо мне']);
    }

    

}