<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        $articles = [
            [
                'id' => 1,
                'title' => 'Number 1',
                'subtitle' => 'Подзаголовок1',
                'content' => 'Content 1',
                'created' => mktime(15,0,0,5,10, 2015),//2015-05-10 15:00
                'img' => '/assets/images/dummy-licensed/blog-image.jpg',
                'comments' => [
                    ['commentid' => 1,
                        'time' => mktime(10, 12, 0, 05, 15, 2015),//15 мая 2015 10:12
                        'text' => 'Текст коммента Ивана',
                        'user' => [
                            'id' => '1',
                            'lastname' => 'Иванов',
                            'firstname' => 'Иван',
                            'fullname' => 'Иванов Иван',
                            'avatar' => '/assets/images/dummy/about-4.jpg'
                        ]],
                    [   'commentid' => 2,
                        'time' => '16 мая 2015 10:12',
                        'text' => 'Текст коммента Петра',
                        'user' => [
                            'id' => 2,
                            'lastname' => 'Петров',
                            'firstname' => 'Петр',
                            'fullname' => 'Петров Петр',
                            'avatar' => '/assets/images/dummy/about-3.jpg'
                        ]]
                ]
            ],
            [
                'id' => 2,
                'title' => 'Number 2',
                'subtitle' => 'Подзаголовок2',
                'content' => 'Content 2',
                'created' => mktime(15,0,0,5,11, 2015), //'2015-05-11 15:00'
                'img' => '/assets/images/dummy-licensed/blog-image-2.jpg',
                'comments' => [
                    [   'commentid' => 3,
                        'time' => mktime(10,12,0,5,17, 2015),//'17 мая 2015 10:12',
                        'text' => 'Текст коммента Петра',
                        'user' => [
                            'id' => 2,
                            'lastname' => 'Петров',
                            'firstname' => 'Петр',
                            'fullname' => 'Петров Петр',
                            'avatar' => '/assets/images/dummy/about-3.jpg'
                        ]
                    ]
                ]
            ],
            [
                'id' => 3,
                'title' => 'Number 3',
                'subtitle' => 'Подзаголовок3',
                'content' => 'Content 3',
                'created' => mktime(15,0,0,5,15, 2015),
                'img' => '/assets/images/dummy-licensed/about-us-image.jpg',
                'comments' =>[
                    [   'commentid' => 4,
                        'time' => mktime(18,0,0,5,15, 2015),
                        'text' => 'Текст коммента',
                        'user' => [
                            'aid' => '3',
                            'lastname' => 'Никулин',
                            'firstname' => 'Дмитрий',
                            'fullname' => 'Никулин Дмитрий',
                            'avatar' => '/assets/images/dummy/about-6.jpg'
                        ]
                    ]
                ]
            ],
            [
                'id' => 4,
                'title' => 'Number 4',
                'subtitle' => 'Подзаголовок4',
                'content' => 'Content 4',
                'created' => mktime(15,0,0,5,17, 2015),
                'img' => '/assets/images/dummy-licensed/about-us-image.jpg',
                'comments' =>[]
            ]
        ];

    return view('pages.main', ['title' => 'Главная хрень', 'articles' => $articles]);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'Обо мне']);
    }



}
