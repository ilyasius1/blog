<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('layouts.secondary', [
            'title' => '',
            'page' => 'admin.pages.category.list',
            'categories' => $categories
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
            'page' => 'admin.pages.category.create',
            'title' => 'Создание категории',
            'activemenu' => 'create_category'
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
        $category = Category::create([
            'name' => $request->input('category_name'),
            'slug' => Str::slug($request->input('category_name'), '_')
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
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
//        $this->authorize('category.edit');
//        $this->middleware('auth');
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('layouts.secondary', [
            'page' => 'admin.pages.category.edit',
            'title' => 'Редактирование категории' . $category->name,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->name = $request->input('category_name');
        $category->slug = Str::slug($category->name, '_');
        $category->save();
        if($request->action == 'apply') {
            return redirect()->route('category.edit', [
                'category' => $category->slug,
            ]);
        }
        return redirect()->route('category.show', [
            'category' => $category->slug,
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

        //$this->authorize('category.delete');
        try {
            $category = Category::where('slug', $slug)->firstOrFail();
            $category->delete();
        } catch (\Exception $exception) {
            var_dump($exception);
            return 'Exception';
        }
        return redirect()->back();
    }
}
