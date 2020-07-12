<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function posts()
    {
        return $this->belongsToMany('Post', 'post_tag', 'tag_id', 'post_id');
    }

    public static function getByArticle(Post $post)
    {
//        return $post->tags;
    }

    public function addTagToPost(Post $post){

    }
}
