<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function roles()
    {
        return $this->belongsToMany('\App\Models\Role', 'role_privilege', 'privilege_id', 'role_id');
    }

    public function users()
    {
        return $this->hasManyThrough('App\Models\User', 'App\Models\Role', 'privilege_id', 'role_id');
    }
}
