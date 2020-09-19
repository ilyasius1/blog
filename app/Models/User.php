<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**Связь с моделью профиля 1:1
    */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id');
    }

    /**Связь с моделью постов 1:M
    */
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    /**M:M*/
    public function roles(){
        return $this->belongsToMany('App\Models\Role','user_role', 'user_id', 'role_id');
    }

    /**M:M:M*/
    public function permissions()
    {
        return $this->hasManyThrough('App\Models\Permission', 'App\Models\Role', 'role_id', 'permission_id');
    }

    /**Есть ли у пользователя указанная роль
     * @var Role $role
    */
    public function hasRole(Role $role)
    {
        return $this->roles->contains($role);
    }

    /**
     * Есть ли у пользователя указанная привилегия
     * @var Permission or string $permission
     * */
    public function hasPermission($permission)
    {
        if(!($permission instanceof Permission)){
            $permission = Permission::where('slug', $permission)->firstOrFail();
        }
        foreach ($this->roles as $role) {
            if($role->permissions->contains($permission)){
                return true;
            }
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->hasRole(Role::findOrFail(1));
    }
    /**
     * Является ли пользователь автором сущности
     */
    public function isAuthorOf($entity){
        return $this->id == $entity->user_id;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }


}
