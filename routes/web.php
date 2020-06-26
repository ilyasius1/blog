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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'MainController@main')
    ->name('Mainpage');

Route::get('/about', 'MainController@about')
    ->name('AboutRoute');

Route::group(['prefix' => 'article'],function(){
    Route::get('/{id}', 'ArticleController@showArticle')
    ->where('id','[0-9]+')
    ->name('ArticleGetRoute');

    Route::post('/add', 'ArticleController@addArticle')
        ->name('AddArticleRoute');

    Route::patch('/edit/{id}', 'ArticleController@editArticle')
        ->where('id','[0-9]+')
        ->name('EditArticleRoute');
    Route::delete('/delete/{id}', 'ArticleController@delete')
        ->where('id','[0-9]+')
        ->name('DeleteArticleRoute');
});