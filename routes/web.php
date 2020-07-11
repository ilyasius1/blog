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

Route::group(['prefix' => 'article'],function(){
    Route::get('/{id}', 'ArticleController@showArticle')
        ->where('id','[0-9]+')
        ->name('ArticleGet');

    /*Route::post('/addtag/{id}', 'ArticleController@addTag')
        ->where('id','[0-9]+')
        ->name('ArticleAddTag');
*/

    Route::post('/add', 'ArticleController@addArticle')
        ->name('AddArticle');

    Route::patch('/edit/{id}', 'ArticleController@editArticle')
        ->where('id','[0-9]+')
        ->name('EditArticle');
    Route::delete('/delete/{id}', 'ArticleController@delete')
        ->where('id','[0-9]+')
        ->name('DeleteArticle');
});


Route::get('/db', 'MainController@db')
        ->name('site.main.db');

Route::get('/register', 'AuthController@register')
->name('register');
Route::post('/register', 'AuthController@registerPost')
->name('registerPost');
Route::get('/login', 'AuthController@login')
->name('login');
Route::post('/login', 'AuthController@loginPost')
->name('loginPost');
Route::get('/resetpassword', 'AuthController@resetPassword')
    ->name('password.reset');

Route::get('/orm', 'MainController@orm');

Route::get('/createEntity', 'MainController@createEntity');

Route::post('addtag/', 'ArticleController@addTags')
    ->where('id','[0-9]+')
    ->name('ArticleAddTags');
Route::post('rmtag/', 'ArticleController@removeTags')
    ->where('id','[0-9]+')
    ->name('ArticleRemoveTags');
Route::post('settag/', 'ArticleController@setTags')
    ->where('id','[0-9]+')
    ->name('ArticleSetTags');
Route::post('addcomment/', 'ArticleController@addComment')
    ->where('id','[0-9]+')
    ->name('ArticleAddComment');

