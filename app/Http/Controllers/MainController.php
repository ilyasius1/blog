<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    return view('pages.main', ['title' => 'Главная', 'articles' => $articles]);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'Обо мне']);
    }

    public function db()
    {
        $users = DB::table('users')
            ->where('username','like', 'user%')
            ->orderByDesc('userid')
            ->get();

        foreach ($users as $user)
        {
            echo 'User ID: ' . $user->userID . '<br>';
            echo 'Username: ' . $user->userName . '<br>';
            echo 'E-mail: ' . $user->email . '<br>';
        }

        $u = DB::table('users')
            ->where('userid','=', '1')
            ->orderByDesc('userid')
            ->first(['userID', 'userName', 'email']);//get()[0];
        echo 'User ID: ' . $u->userID . '<br>';
        echo 'Username: ' . $u->userName . '<br>';
        echo 'E-mail: ' . $u->email . '<br>';


        debug($users);
        return 'DB';
    }

    public function orm()
    {
     /*   $user = new User();
        $user->userName = 'user1';
        $user->email = 'user1@asfa';
        $user->password = '123123';
        $user->name = 'user1';
        $user->phone = '123123123';
        $user->avatar = 'asfafa';
        $user->save();

        $article = new Article();

        $article->title = 'title';
        $article->subtitle = 'subtitle';
        $article->text = 'text';
        $article->img = 'img';
        $article->created_by = '1';
        $article->modified_by = '1';
        $article->save();

        $article1 = new Article();

        $article1->title = 'title1';
        $article1->subtitle = 'subtitle1';
        $article1->text = 'text1';
        $article1->img = 'img1';
        $article1->created_by = '1';
        $article1->modified_by = '1';
        $article1->save();
*/


        /*$article = Article::all();
        dump($article);
        debug($article);*/
        /*echo 'where <br/>';
        $article2 = Article::where('title', '=', 'title1')
            ->first();
        dump($article2->title);
        debug($article);
        echo 'update </br>';
        $article2->title = 'title1 updated';
        $article2->save();
        dump($article2->title);
        debug($article);
*/

        $id = 3;
        $article = Article::getById($id);//Article::find($id);
//        $tags = Tag::getByArticle($article);
        foreach ($article->tags as $t){
            dump($t->title);
        }
        $tags = $article->tags;
        $comments = Comment::getByArticle($article);//$article->comments;
        $comment1 = new Comment();
        $comment1->author = '2';
        $comment1->article = '1';
        $comment1->text = 'cmmment to 1 from 2';
        $comment1->save();
        foreach ($comments as $comment){
            echo 'Comment ID#' . $comment->commentID . ':</br>';
            echo 'autorID:</br>';
            echo $comment->author;
            echo '</br>text:</br>';
            echo $comment->text;
            echo '</br>date:</br>';
            var_dump(dateRu($comment->created_at));
            echo '<br/>';
        }
//        $tagIDs1->toArray();

        /*foreach ($tagIDs1 as $i =>$t){
            $tagIDs1[$i] = ($t->tag);
        }
        $tags = Tag::find($tagIDs1);*/
        /*$tags = Tag::addselect(['tag' => DB::table('article_tags_relations')
            ->select('tag')
            ->where('article', $article->articleID)
            ->whereColumn('tagID', 'article_tags_relations.tag')
        ])->get();*/
//        $tags = Tag::find(DB::table('article_tags_relations')
//            ->select('tag')
//            ->where('article', $article->articleID)
//            ->get()
//            ->toArray()
//        );
            //->whereColumn('tagID', 'article_tags_relations.tag')

        dump($article, $tags, $comments);
        debug($article, $tags, $comments);
        return 'ok';
    }

    public function createEntity()
    {
        $tag = new Tag();
        $tag->title = 'tag 8';
        //$tag->save();
        return 'created id#' . $tag->tagId;
    }



}
