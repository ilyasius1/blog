<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
//M:M
    public function users()
    {
        return $this->belongsToMany('\App\Models\User', 'user_role', 'role_id', 'user_id');
    }
//M:M
    public function permissions(){
        return $this->belongsToMany('\App\Models\Permission', 'role_permission', 'role_id', 'permission_id');
    }

}
