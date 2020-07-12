<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['phone', 'fullname'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
