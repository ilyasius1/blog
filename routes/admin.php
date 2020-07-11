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


Route::prefix('articles')->group(function(){
    Route::get('/{id?}', 'ArticleController@showone')
        ->name('admin.main.showone');
    Route::get('/edit/{id?}', 'ArticleController@edit')
        ->name('admin.main.edit');
    Route::patch('/edit/{id?}', 'ArticleController@editPost')
        ->name('admin.main.patch');
    Route::delete('/delete/{id?}', 'ArticleController@delete')
        ->name('admin.main.delete');
});

Route::prefix('users')->group(function (){
    Route::get('/', 'UsersController@index')
        ->name('admin.users.index');
    Route::get('/{id?}', 'UsersController@user')
        ->name('admin.users.user');
    Route::get('/edit/{id}', 'UsersController@edit')
        ->name('admin.users.edit');
    Route::patch('/edit/{id}', 'UsersController@editPost')
        ->name('admin.users.editpost');
    Route::get('/resetpassword/{id}', 'UsersController@resetPassword')
    ->name('admin.users.resetpassword');

});