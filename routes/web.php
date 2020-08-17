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

Route::get('/docs', 'UserDocsController@index')->name('docs');
Route::post('/docs/submit', 'UserDocsController@submit');


Route::get('/about', function(){return view('about');})->name('about');
Route::get('/services', function(){ return view('services');})->name('services');
Route::get('/contact', function(){return view('contact');})->name('contact');

Route::get('/check', function(){
    if (!Auth::user())
        return view('check');

    return view('home');
})->name('check');


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::get('/home', function (){return view('user.home');})->name('user.home');

    Route::get('/profile','ProfileController@show' )->name('user.profile');

    Route::patch('/account','UserController@update');
    Route::patch('/profile','ProfileController@update');
    Route::patch('/profileImage', 'ProfileController@store');

    Route::group(["middleware" => 'App\Http\Middleware\AdminMiddleware'], function()
    {
        Route::group(['prefix' => 'blogs'], function(){
             Route::get('', 'BlogController@all')->name('admin.blog');
             Route::get('/create', function (){return view('admin.blog.create'); })->name('blog.create');
             Route::get('/categories', function (){return view('admin.blog.categories'); })->name('blog.categories');
             Route::post('/category/{category}/edit', 'CategoryController@update');
             Route::delete('/category/{category}/delete', 'CategoryController@delete');
             Route::post('/category/create', 'CategoryController@create');
             Route::post('/create', 'BlogController@store');
        });

        Route::group(['prefix' => 'blog'] , function(){
            Route::get('/{blog:id}/edit', 'BlogController@edit')->name('blog.edit');
            Route::get('/{blog:id}/toggle', 'BlogController@toggle');
            Route::patch('/{blog:id}/edit', 'BlogController@update');
            Route::get('/{blog}/delete', 'BlogController@delete');
        });

        Route::group(['prefix' => 'docs'], function(){
            Route::get('', 'DocumentController@show')->name('admin.docs');
            Route::get('/all', 'DocumentController@index');

            Route::post('/create-header', 'HeaderController@create');
            Route::delete('/delete-component/{questions}', 'DocumentController@delete');
            // Route::get('/delete-header/{questions}', 'DocumentController@delete');

            Route::post('/create-select', 'DocumentController@create');

            Route::post('/create-rels', 'RelsController@create');
            Route::delete('/remove-rels/{rels}', 'RelsController@remove');

            Route::post('/{docs}/upload', 'DocumentController@upload');
            Route::delete('/upload/{docs}/remove', 'DocumentController@deleteUpload');
            Route::patch('/change-quest/{docs}', 'DocumentController@update');
            Route::post('/save-quest', 'DocumentController@save');
            Route::post('/save-rels', 'RelsController@save');
        });

    });
});

