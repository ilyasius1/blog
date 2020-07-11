<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    const CREATED_AT = 'created_at';
//    const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'articleID';
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'article_tags', 'article', 'tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'article');
    }

    public function addTag($tagID)
    {
        $this->tags()->detach($tagID);
        $this->tags()->attach($tagID);
    }

    public function getAll()
    {

    }

    public static function getById($id)
    {
        return self::find($id);
    }

    public function getByName($name)
    {
        return self::where('name', '$name');
    }


}
