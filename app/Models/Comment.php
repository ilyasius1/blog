<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'commentID';
    protected $fillable = ['text', 'author'];

    public $timestamps = false;

    public function articles()
    {
        return $this->belongsTo('App\Models\Article', 'article');
    }

    public static function getByArticle(Article $article)
    {
        return $article->comments;
    }

    public function createComment(Request $request ){

    }



}
