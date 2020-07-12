<?php

use App\Http\Controllers\Controller;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'MainController@main')
    ->name('Mainpage');

Route::get('/about', 'MainController@about')
    ->name('About');
/*
Route::group(['prefix' => 'post'],function(){
    Route::get('/{id}', 'PostController@showPost')
        ->where('id','[0-9]+')
        ->name('PostGet');

    /*Route::post('/addtag/{id}', 'PostController@addTag')
        ->where('id','[0-9]+')
        ->name('PostAddTag');
*/
/*
    Route::get('/add', 'PostController@addPost')
        ->name('AddPost');

    Route::patch('/{id}/edit', 'PostController@editPost')
        ->where('id','[0-9]+')
        ->name('EditPost');
    Route::delete('/{id}', 'PostController@delete')
        ->where('id','[0-9]+')
        ->name('DeletePost');
});*/


Route::get('/db', 'MainController@db')
        ->name('site.main.db');

Route::get('/register', 'AuthController@register')
->name('register');
Route::post('/register', 'AuthController@store')
->name('registerPost');
Route::get('/login', 'AuthController@login')
->name('login');
Route::post('/login', 'AuthController@loginPost')
->name('loginPost');
Route::get('/resetpassword', 'AuthController@resetPassword')
    ->name('password.reset');

Route::get('/orm', 'MainController@orm');

Route::get('/createEntity', 'MainController@createEntity');

Route::post('addtag/', 'PostController@addTags')
    ->where('id','[0-9]+')
    ->name('PostAddTags');
Route::post('rmtag/', 'PostController@removeTags')
    ->where('id','[0-9]+')
    ->name('PostRemoveTags');
Route::post('settag/', 'PostController@setTags')
    ->where('id','[0-9]+')
    ->name('PostSetTags');
Route::post('addcomment/', 'PostController@addComment')
    ->where('id','[0-9]+')
    ->name('PostAddComment');

Route::group(['namespace' => 'Blog'], function()
{
    Route::resource('post', 'PostController');
});
