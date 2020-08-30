<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('post.create');
        /*if(Gate::denies('create-post')){
            return 'Access denied';
        }*/
        $alltags = Tag::all();
        return view('layouts.secondary',[
            'page' => 'pages.create',
            'activemenu' => 'create',
            'alltags' => $alltags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->input('post_title'),
            'fulltext' => $request->input('fulltext'),
            'slug' => Str::slug($request->input('post_title'), '_'),
            'announce' => self::makeAnnounce($request->input('fulltext'))
        ]);
        $tags = $request->input('checkedTags');
        $user = User::find(1);
        $user->posts()->save($post);
        $post->tags()->sync($tags);
        if($request->action == 'apply'){
            return redirect()->route('post.edit', ['post' => $post->slug]);
        }
        return redirect()->route('post.show', ['post' => $post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $tags = $post->tags;
        $comments = $post->comments;
        return view('layouts.secondary', [
            'page' => 'pages.post',
            'post' => $post,
            'tags' => $tags,
            'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $this->authorize('post.edit');
        /*if(Gate::denies('create-post')){
            return 'Access denied';
        }*/
        $this->middleware('auth');
        $post = Post::where('slug', $slug)->firstOrFail();
        $tags = $post->tags;
        $alltags = Tag::all();
        return view('layouts.secondary', [
            'page' => 'pages.edit',
            'title' => 'Редактирование' . $post->title,
            'post' => $post,
            'tags' => $tags,
            'alltags' => $alltags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $tags = $request->input('checkedTags');
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->title = $request->input('post_title');
        $post->fulltext = $request->input('fulltext');
        $post->slug = Str::slug($post->title, '_');
        /*$length = 650;
        if (mb_strlen($post->fulltext) <= $length) {
            $length = mb_strlen($post->fulltext);
        }
        elseif(mb_strpos($post->fulltext, ' ', $length) && mb_strpos($post->fulltext, ' ', $length) < $length + 100){
            $length = mb_strpos($post->fulltext, ' ', $length);
        }
        $post->announce = mb_substr($post->fulltext, 0, $length) . '...';*/
        $post->announce = self::makeAnnounce($post->fulltext);
        $post->save();
        $post->tags()->sync($tags);
        if($request->action == 'apply') {
            return back()->withInput();
        }
        return redirect()->route('post.show', [
            'post' => $post->slug,
        ]);
    }

    public function delete($slug)
    {
        /*if(Gate::denies('delete-post')) {
            return 'Access denied';
        }*/
        $this->authorize('post.delete');
        try {
            $post = Post::where('slug', $slug)->firstOrFail();
            $post->delete();
        } catch (\Exception $exception) {
            var_dump($exception);
            return 'Exception';
        }
        return redirect()->route('Mainpage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected static function makeAnnounce($fulltext, $length = 650, $deviation = 100)
    {
        if (mb_strlen($fulltext) <= $length) {
            $length = mb_strlen($fulltext);
        }
        elseif(mb_strpos($fulltext, ' ', $length) && mb_strpos($fulltext, ' ', $length) < $length + $deviation){
        $length = mb_strpos($fulltext, ' ', $length);
        }
        return mb_substr($fulltext, 0, $length) . '...';
    }

}