<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('layouts.secondary', [
            'title' => 'Список пользователей',
            'page' => 'admin.pages.user.list',
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id){
        //$this->authorize('privilege.edit');
//        $this->middleware('auth');
        $user = User::findOrFail($id);
        $roles = $user->roles;
        $allroles = Role::all();
        return view('layouts.secondary', [
            'page' => 'admin.pages.user.edit',
            'title' => 'Редактирование пользователя' . $user->username,
            'user' => $user,
            'roles' => $roles,
            'allroles' => $allroles
        ]);
    }

    public function update(Request $request, $id)
    {
        $roles = $request->input('checkedRoles');
        $user = User::findOrFail($id);
        $user->username = $request->input('user_name');
        $user->save();
        $user->roles()->sync($roles);
        if($request->action == 'apply') {
            return redirect()->route('admin.users.edit', [
                'user' => $user->id,
            ]);
        }
        return redirect()->route('admin.user.show', [
            'user' => $user->id,
        ]);
    }

    public function delete(){
        //$this->authorize('users.delete');
        try {
            $user = User::findOrFail($id);
            $user->delete();
        } catch (\Exception $exception) {
            var_dump($exception);
            return 'Exception';
        }
        return redirect()->back();
    }

    public function resetPassword(){
        return 'admin resetPassword';
    }

    public function active($query){
        return $query->where('is_active', 1);
    }
}
