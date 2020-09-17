<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')
    ->name('admin.main.index');
Route::get('/about', 'MainController@about')
    ->name('admin.main.about');
Route::get('/about/edit', 'MainController@editAbout')
    ->name('admin.main.about.edit');
Route::get('/about/edit', 'MainController@editAboutPost')
    ->name('admin.main.about.editpost');


Route::prefix('post')->group(function(){
    Route::get('/{id?}', 'PostController@showone')
        ->name('admin.main.showone');
    Route::get('/edit/{id?}', 'PostController@edit')
        ->name('admin.main.edit');
    Route::patch('/edit/{id?}', 'PostController@editPost')
        ->name('admin.main.patch');
    Route::delete('/delete/{id?}', 'PostController@delete')
        ->name('admin.main.delete');
});

Route::prefix('users')->group(function (){
    Route::get('/', 'UsersController@index')
        ->name('admin.users.index');
    Route::get('/{user}', 'UsersController@show')
        ->name('admin.users.show');
    Route::get('/{user}/edit', 'UsersController@edit')
        ->name('admin.users.edit');
    Route::put('/{user}', 'UsersController@update')
        ->name('admin.users.update');
    Route::delete('/{user}', 'UsersController@delete')
        ->name('admin.users.delete');
    Route::get('/{id}/resetpassword', 'UsersController@resetPassword')
    ->name('admin.users.resetpassword');

});


Route::resource('category', 'CategoryController');
Route::delete('/category/{category}', 'CategoryController@delete')->name('category.delete');
    /*Route::get('/', 'CategoryController@index')
        ->name('admin.category.index');
    Route::get('/{category}', 'CategoryController@show')
        ->name('admin.category.show');
    Route::get('/{category}/edit', 'CategoryController@edit')
        ->name('admin.category.edit');
    Route::post('/{category}/update', 'CategoryController@update')
        ->name('admin.category.update');
    Route::get('/{category}/update', 'CategoryController@create')
        ->name('admin.category.create');
    Route::get('/create', 'CategoryController@create')
        ->name('admin.category.create');*/
Route::resource('role', 'RoleController');
Route::delete('/role/{role}', 'RoleController@delete')->name('role.delete');

Route::resource('permission', 'PermissionController');
Route::delete('/permission/{permission}', 'PermissionController@delete')->name('permission.delete');

