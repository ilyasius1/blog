<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
