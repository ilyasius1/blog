<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function main()
    {
        $posts = Post::withCount(['comments', 'tags'])
            ->latest()
            ->get();
        $user = Auth::user();
        debug($user);

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
