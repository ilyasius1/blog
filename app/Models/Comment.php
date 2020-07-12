<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['text', 'author'];
    use SoftDeletes;

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function getByPost(Post $post)
    {
        return $post->comments->orderBy('created_at');
    }

    public function createComment(Request $request ){

    }



}
