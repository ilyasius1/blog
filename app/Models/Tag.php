<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'TagID';

    public function articles()
    {
        return $this->belongsToMany('Article', 'article_tags', 'tag', 'article');
    }

    public static function getByArticle(Article $article)
    {
//        return $article->tags;
    }

    public function addTagToArticle(Article $article){

    }
}
