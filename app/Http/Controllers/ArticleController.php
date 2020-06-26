<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Section;

class ArticleController extends Controller
{
    public function articleBySlug($slug)
    {
        $article = new Article;
        /*try {
            $article = Artcle::where('slug', $slug)
                ->active()
                ->intime()
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404);
        }*/
        
        return view('layouts.secondary', [
            'article' =>   'pages.article',
            'title' => $article->title,
            'article' => $article
        ]);
    }

    public function listByTag($tag)
    {
        $article = new Article;
        /*try {
            $article = Tag::where('name', $tag)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404);
        }*/
        return view('layouts.primary', [
            'article' =>   'pages.article',
            'title' => $article->title ?? '',
            'article' => $article
        ]);
    }

    public function showArticle(Request $request, $id=NULL)
    {
        $articles = [
            [
                'id' => 1,
                'title' => 'Number 1',
                'subtitle' => 'Подзаголовок1',
                'content' => 'Content 1',
                'img' => 'assets/images/dummy-licensed/blog-image.jpg',
                'comments' => [
                    ['commentid' => 1,
                    'time' => '15 мая 2015 10:12',
                    'text' => 'Текст коммента Ивана',
                    'user' => [
                        'id' => '1',
                        'lastname' => 'Иванов',
                        'firstname' => 'Иван',
                        'fullname' => 'Иванов Иван',
                        'avatar' => '/assets/images/dummy/about-5.jpg'
                    ]],
                    [   'commentid' => 2,
                        'time' => '16 мая 2015 10:12',
                        'text' => 'Текст коммента Петра',
                        'user' => [
                            'id' => 2,
                            'lastname' => 'Петров',
                            'firstname' => 'Петр',
                            'fullname' => 'Петров Петр',
                            'avatar' => '/assets/images/dummy/about-5.jpg'
                    ]]
                ]
            ],
            [
                'id' => 2,
                'title' => 'Number 2',
                'subtitle' => 'Подзаголовок2',
                'content' => 'Content 2',
                'img' => 'assets/images/dummy-licensed/blog-image.jpg',
                'comments' => [
                    [   'commentid' => 3,
                        'time' => '17 мая 2015 10:12',
                        'text' => 'Текст коммента Петра',
                        'user' => [
                            'id' => 2,
                            'lastname' => 'Петров',
                            'firstname' => 'Петр',
                            'fullname' => 'Петров Петр',
                            'avatar' => '/assets/images/dummy/about-5.jpg'
                        ]      
                    ]
                ]
            ],
            [
                'id' => 3,
                'title' => 'Number 3',
                'subtitle' => 'Подзаголовок3',
                'content' => 'Content 3',
                'img' => 'assets/images/dummy-licensed/blog-image.jpg',
                'comments' =>[
                    [   'commentid' => 4,
                        'time' => '15 мая 2015 10:12',
                        'text' => 'Текст коммента',
                        'user' => [
                            'aid' => '3',
                            'lastname' => 'Никулин',
                            'firstname' => 'Дмитрий',
                            'fullname' => 'Никулин Дмитрий',
                            'avatar' => '/assets/images/dummy/about-5.jpg'
                        ]
                    ]
                ]
            ]
        ];
        $article=$articles[$id-1];
        return view('pages.article', ['id' => $id, 'article' => $article]);
    }

    public function addArticle()
    {
        return 'add'/*view('')*/;
    }
    
    public function editArticle()
    {
        return 'edit'/*view('')*/;
    }

    public function deleteArticle()
    {
        return redirect()->route('Mainpage');
    }
}
