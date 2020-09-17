<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    protected function validator(array $data)
    {
        $messages = [
            'required' => 'Поле Название привилегии обязательно для заполнения.',
            'unique' => 'Такая привилегия уже существует.'
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:240', 'unique:permissions']
        ], $messages);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('layouts.secondary', [
            'title' => 'Список привилегий',
            'page' => 'admin.pages.permission.list',
            'permissions' => $permissions
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
            'page' => 'admin.pages.permission.create',
            'title' => 'Создание привилегии',
            'activemenu' => 'create_permission'
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
        $validator = $this->validator($request->input());
        if ($validator->fails()) {
            return redirect()->route('permission.create')
                ->withErrors($validator)
                ->withInput();
        }
        return 'success';
        Permission::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'), '_')
//            'name' => $request['permission_name'],
//            'slug' => Str::slug($request['permission_name'], '_')
        ]);
        return redirect()->route('permission.index');
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
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //$this->authorize('permission.edit');
//        $this->middleware('auth');
        $permission = Permission::where('slug', $slug)->firstOrFail();
        return view('layouts.secondary', [
            'page' => 'admin.pages.permission.edit',
            'title' => 'Редактирование привилегии' . $permission->name,
            'permission' => $permission
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
        $permission = Permission::where('slug', $slug)->firstOrFail();
        $permission->name = $request->input('permission_name');
        $permission->slug = Str::slug($permission->name, '_');
        $permission->save();
        if($request->action == 'apply') {
            return redirect()->route('permission.edit', [
                'permission' => $permission->slug,
            ]);
        }
        return redirect()->route('permission.show', [
            'permission' => $permission->slug,
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

        //$this->authorize('permission.delete');
        try {
            $category = Permission::where('slug', $slug)->firstOrFail();
            $category->delete();
        } catch (\Exception $exception) {
            var_dump($exception);
            return 'Exception';
        }
        return redirect()->back();
    }

}
