<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    use SoftDeletes;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category()
    {
        return$this->belongsTo('App\Models\Category', 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
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
