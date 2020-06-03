<?php

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

Route::get('/', function () {
    return redirect('/check');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog','BlogController@index')->name('blog');
Route::get('/blog/{blog}','BlogController@show')->name('show');

Route::get('/bestcomment/{comment}', 'BestCommentController@edit');

Route::post('/comment/{blog}', 'CommentController@store');
Route::delete('/comment/{comment}/delete', 'CommentController@delete');

Route::get('/about', function(){return view('about');})->name('about');

Route::get('/services', function(){ return view('services');})->name('services');
Route::get('/contact', function(){return view('contact');})->name('contact');

Route::get('/check', function(){
    if (!Auth::user())
        return view('check');

    return redirect()->to('/user/home');
})->name('check');


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::get('/home', function (){return view('user.home');})->name('user.home');

    Route::get('/profile','ProfileController@show' )->name('user.profile');
    Route::get('/albums', 'AlbumController@index')->name('user.albums');

    Route::patch('/account','UserController@update');
    Route::patch('/profile','ProfileController@update');
    Route::patch('/profileImage', 'ProfileController@store');

    Route::group(["middleware" => 'App\Http\Middleware\AdminMiddleware'], function()
    {
        Route::get('/blogs', 'BlogController@all')->name('admin.blog');
        Route::get('/blogs/create', function (){return view('admin.blog.create'); })->name('blog.create');
        Route::post('/blogs/create', 'BlogController@store');


        Route::get('/blog/{blog:id}/edit', 'BlogController@edit')->name('blog.edit');
        Route::patch('/blog/{blog:id}/edit', 'BlogController@update');

        Route::get('/blog/{blog}/delete', 'BlogController@delete');

    });
});

