<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Tag;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function main()
    {
        $posts = Post::withCount(['comments', 'tags'])
            ->latest()
            ->get();
        $user = Auth::user();

    return view('pages.main', ['title' => 'Главная', 'posts' => $posts, 'activemenu' => 'main']);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'Обо мне']);
    }

    public function db()
    {
        $users = DB::table('users')
            ->where('username','like', 'user%')
            ->orderByDesc('userid')
            ->get();

        foreach ($users as $user)
        {
            echo 'User ID: ' . $user->userID . '<br>';
            echo 'Username: ' . $user->userName . '<br>';
            echo 'E-mail: ' . $user->email . '<br>';
        }

        $u = DB::table('users')
            ->where('userid','=', '1')
            ->orderByDesc('userid')
            ->first(['userID', 'userName', 'email']);
        echo 'User ID: ' . $u->userID . '<br>';
        echo 'Username: ' . $u->userName . '<br>';
        echo 'E-mail: ' . $u->email . '<br>';


        debug($users);
        return 'DB';
    }

    public function test()
    {
        $user = Auth::user();
//        echo Str::slug('Привилегия2', '_') . '<br/>';
$user = \App\Models\User::findOrFail(3);
        try {
            $priv = Role::findOrFail(2);
        }catch (\Exception $e){
            if($e instanceof ModelNotFoundException){
                return response()->view('errors.default', [
                    'errorCode' => 404,
                    'errorMessage' => 'Роль не найдена'
                ], 404);
            }
        }
        try {
            $priv = Permission::findOrFail(4);
        }catch (\Exception $e){
            if($e instanceof ModelNotFoundException){
                return response()->view('errors.default', [
                    'errorCode' => 404,
                    'errorMessage' => 'Привилегия не найдена'
                ], 404);
            }
        }
//        dump($role->privileges->contains($priv));
//        $roles =$user->roles;
//        dump($roles);
        dump($user->hasPrivilege($priv));
//        dump($user->roles->privileges->contains($priv));
//        dump($user->hasRole($role));
//        dump($user,$user->roles, $role);
        return 'MainController@test';
    }

    public function createEntity()
    {

        return 'created id#';
    }



}
