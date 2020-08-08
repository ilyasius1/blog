<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        return 'admin users index';
    }

    public function user($id){
        return 'user ' . $id;
    }

    public function edit(){
        return 'admin edit user';
    }

    public function editPost(){
        return 'admin edit userPost';
    }

    public function delete(){
        return 'admin edit userPost';
    }

    public function resetPassword(){
        return 'admin resetPassword';
    }

    public function active($query){
        return $query->where('is_active', 1);
    }
}
