<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    protected function validator(array $data)
    {
        $messages = [
            'required' => 'Поле Название роли обязательно для заполнения.',
            'unique' => 'Такая роль уже существует.'
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:240', 'unique:roles']
        ], $messages);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('layouts.secondary', [
            'title' => 'Список ролей',
            'page' => 'admin.pages.role.list',
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.secondary',[
            'page' => 'admin.pages.role.create',
            'title' => 'Создание роли',
            'activemenu' => 'create_role'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->validate(['name' => ['required', 'string', 'max:255']]);
        $role = Role::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'), '_')
        ]);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //$this->authorize('role.edit');
//        $this->middleware('auth');
        $role = Role::where('slug', $slug)->firstOrFail();
        $permissions = $role->permissions;
        $allpermissions = Permission::all();
        return view('layouts.secondary', [
            'page' => 'admin.pages.role.edit',
            'title' => 'Редактирование роли' . $role->name,
            'role' => $role,
            'permissions' => $permissions,
            'allpermissions' => $allpermissions
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $permissions = $request->input('checkedPermissions');
        $role = Role::where('slug', $slug)->firstOrFail();
        $role->name = $request->input('name');
        $role->slug = Str::slug($role->name, '_');
        $role->save();
        $role->permissions()->sync($permissions);
        if($request->action == 'apply') {
            return redirect()->route('role.edit', [
                'role' => $role->slug,
            ]);
        }
        return redirect()->route('role.show', [
            'role' => $role->slug,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($slug)
    {

        //$this->authorize('role.delete');
        try {
            $role = Role::where('slug', $slug)->firstOrFail();
            $role->delete();
        } catch (\Exception $exception) {
            var_dump($exception);
            return 'Exception';
        }
        return redirect()->back();
    }
}
