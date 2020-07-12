<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function main()
    {
        $posts = [
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
        $posts = Post::withCount(['comments', 'tags'])->get();

    return view('pages.main', ['title' => 'Главная', 'posts' => $posts, 'activemenu' => 'main']);
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
        $id = 3;
        $post = Article::getById($id);//Article::find($id);
//        $tags = Tag::getByArticle($post);
        foreach ($post->tags as $t){
            dump($t->title);
        }
        $tags = $post->tags;
        $comments = Comment::getByArticle($post);//$post->comments;
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
        dump($post, $tags, $comments);
        debug($post, $tags, $comments);
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
