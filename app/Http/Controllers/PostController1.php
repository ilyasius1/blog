<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController1 extends Controller
{
    public function showPost(Request $request, $id=NULL)
    {
        $post = Post::withCount(['comments', 'tags'])->find($id);
        dump('$post->comments:');
        dump($post->comments_count);
        dump('$post->tags:');
        dump($post->tags_count);
        //        $tags = Tag::getByPost($post);
//        $tagIDs1 = DB::table('post_tag')
//            ->select('tag')
//            ->where('post', $post->postID)
//            ->get();
//        foreach ($tagIDs1 as $i =>$t){
//            $tagIDs1[$i] = ($t->tag);
//        }
//        $tags = Tag::find($tagIDs1);
//        $tags = Tag::where('tagID', $tagIDs1->tag)
//            ->get();
//        $tags = Tag::find([$tagIDs1->tagID])
//            ->whereColumn('tagID', 'post_tag.tag');
//            ->get();

//        $comments = Comment::where('post', $post->postID)->get();
//        $art = DB::table('posts')->where('postID', '=', '4')->get()[0];
//        dump(date('Y',strtotime($art->created_at)));
//        debug($art);
        $tags = $post->tags;
        dump('$post:');
        dump($post);
        dump('$tags:');
        dump($tags);
        debug($post, $tags);
        return view('layouts.secondary', [
            'page' => 'pages.addtag',
            'post' => $post]);
//                return 'ok';
//        return view('layouts.secondary', [
//            'page' => 'pages.post',
//            'title' => 'Статья ' . $post->title,
//            'id' => $post->id,
//            'post' => $post,
//            'comments' => $comments
//        ]);
    }
    public function addPost()
    {
        $post = new Post();
//        $post->title =
        return 'add'/*view('')*/;
    }

    public function editPost()
    {
        return 'edit'/*view('')*/;
    }

    public function deletePost()
    {
        return redirect()->route('Mainpage');
    }

    public function addTags(Request $request)
    {
//        $tagID = $request->all()['tag'];
        $tagID = $request->input('tag');
        $postID = $request->input('post');
        $post = Post::getById($postID);
        $post->addTag($tagID);
        return redirect()->back();
    }

    public function removeTags(Request $request)
    {
        $tagID = $request->input('tag');
        $postID = $request->all()['post'];
        $post = Post::getById($postID);
        $post->tags()->detach($tagID);
        return redirect()->back();
    }

    public function setTags(Request $request)
    {
        $tagID = explode(',', $request->input('tag'));
        $postD = $request->all()['post'];
        Post::getById($postID)->tags()->sync($tagID);
        return redirect()->back();
    }

    public function addComment(Request $request)
    {
        $postID = $request->input('post');
        $post = Post::find($postID);
        $userID = 1;
        $text = $request->input('commenttext');
        $comment = $post->comments()->create([
            'author' => $userID,
            '$post' => $postID,
            'text' => $text
        ]);
        return redirect()->back();
    }
}
