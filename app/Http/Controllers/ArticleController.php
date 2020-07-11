<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function articleBySlug($slug)
    {
        //$article = new Article;
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
        //$article = new Article;
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
                        'time' => mktime(10, 12, 0, 5, 16, 2015),//'16 мая 2015 10:12',
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
//        $article=$articles[$id-1];
        $article = Article::withCount(['comments', 'tags'])->find($id);
        dump('$article->comments:');
        dump($article->comments_count);
        dump('$article->tags:');
        dump($article->tags_count);
//        $tags = Tag::getByArticle($article);
//        $tagIDs1 = DB::table('article_tags')
//            ->select('tag')
//            ->where('article', $article->articleID)
//            ->get();
//        foreach ($tagIDs1 as $i =>$t){
//            $tagIDs1[$i] = ($t->tag);
//        }
//        $tags = Tag::find($tagIDs1);
//        $tags = Tag::where('tagID', $tagIDs1->tag)
//            ->get();
//        $tags = Tag::find([$tagIDs1->tagID])
//            ->whereColumn('tagID', 'article_tags_relations.tag');
//            ->get();

//        $comments = Comment::where('article', $article->articleID)->get();
//        $art = DB::table('articles')->where('articleID', '=', '4')->get()[0];
//        dump(date('Y',strtotime($art->created_at)));
//        debug($art);
        $tags = $article->tags;
        $tag7 = $article->tags(7);
        dump('$article->TAG7:');
        dump($article->articleID);
        dump('$article->articleID:');
        dump($article->articleID);
        dump('$article:');
        dump($article);
//        dump('$comments:');
//        dump($comments);
//        dump('count($comments):');
//        dump(count($comments));
//        dump('$tagIDs1:');
//        dump($tagIDs1);
        dump('$tags:');
        dump($tags);
        debug($article, $tags);
        return view('layouts.secondary', [
            'page' => 'pages.addtag',
            'article' => $article]);
//                return 'ok';
//        return view('layouts.secondary', [
//            'page' => 'pages.article',
//            'title' => 'Статья ' . $article->title,
//            'id' => $article->articleID,
//            'article' => $article,
//            'comments' => $comments
//        ]);
    }

    public function addArticle()
    {
        $article = new Article();
//        $article->title =
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

    public function addTags(Request $request)
    {
//        $tagID = $request->all()['tag'];
        $tagID = $request->input('tag');
        $articleID = $request->input('article');
        $article = Article::getById($articleID);
        $article->addTag($tagID);
        return redirect()->back();
    }

    public function removeTags(Request $request)
    {
        $tagID = $request->input('tag');
        $articleID = $request->all()['article'];
        $article = Article::getById($articleID);
        $article->tags()->detach($tagID);
        return redirect()->back();
    }

    public function setTags(Request $request)
    {
        $tagID = explode(',', $request->input('tag'));
        $articleID = $request->all()['article'];
        Article::getById($articleID)->tags()->sync($tagID);
        return redirect()->back();
    }

    public function addComment(Request $request)
    {
        $articleID = $request->input('article');
        $article = Article::find($articleID);
        $userID = 1;
        $text = $request->input('commenttext');
        $comment = $article->comments()->create([
            'author' => $userID,
            '$article' => $articleID,
            'text' => $text
        ]);
        return redirect()->back();
    }
}
