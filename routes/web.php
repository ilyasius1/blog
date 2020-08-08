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

Route::get('/', 'MainController@main')
    ->name('Mainpage');

Route::get('/about', 'MainController@about')
    ->name('About');

Route::get('/db', 'MainController@db')
        ->name('site.main.db');
/*
Route::get('/register', 'AuthController@register')
->name('register');
Route::post('/register', 'AuthController@store')
->name('register.store');
Route::get('/login', 'AuthController@login')
->name('login');
Route::post('/login1', 'AuthController@loginPost')
->name('loginPost');
Route::get('/resetpassword', 'AuthController@resetPassword')
    ->name('password.reset');
*/
Route::get('/orm', 'MainController@orm');

Route::get('/createEntity', 'MainController@createEntity');

Route::group(['namespace' => 'Blog'], function()
{
    Route::resource('post', 'PostController');
    Route::post('/post/{post}', 'PostController@update')->name('post.update');
    Route::delete('/post/{post}', 'PostController@delete')->name('post.delete');
});//->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
