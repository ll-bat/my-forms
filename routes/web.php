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


Route::get('tests', 'TestsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/docs', 'UserDocsController@index')->name('docs');

Route::get('/check', function(){
    if (!Auth::user())
        return view('check');

    return redirect()->route('home');
})->name('check');


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::get('/home', 'DocsController@index')->name('user.home');

    Route::get('/profile','ProfileController@show' )->name('user.profile');
    Route::get('/mydocs', 'MyDocsController@index')->name('user.mydocs');

    Route::patch('/account','UserController@update');
    Route::patch('/profile','ProfileController@update');
    Route::patch('/profileImage', 'ProfileController@store');

    // Route::group(['prefix' => 'doc'], function(){
    //      Route::get('{export}', 'MyDocsController@show');
    //      Route::get('{export}/download', 'MyDocsController@download');
    // });

     Route::group(['prefix' => 'docs', 'middleware' => 'admin'], function(){
        Route::get('', 'DocsController@show')->name('admin.docs');
        Route::get('/all', 'DocumentController@index');
        Route::post('/create-header', 'DocumentController@createHeader');
        Route::delete('/delete-component/{questions}', 'DocumentController@delete');
        Route::post('/create-select', 'DocumentController@create');
        Route::post('/create-rels', 'RelsController@create');
        Route::delete('/remove-rels/{rels}', 'RelsController@remove');
        Route::post('/{docs}/upload', 'DocumentController@upload');
        Route::delete('/upload/{docs}/remove', 'DocumentController@deleteUpload');
        Route::patch('/change-quest/{docs}', 'DocumentController@update');
        Route::post('/save-quest', 'DocumentController@save');
        Route::post('/save-rels', 'RelsController@save');
        Route::post('/update', 'DocumentController@updateIndex');    
        Route::get('active', 'DocsController@active');
        Route::get('disable', 'DocsController@disable');
    });

    Route::get('docs/responses', 'UserDocsController@show')->name('admin.response');
    Route::get('docs/responses/get-all', 'UserDocsController@getResponses');
    Route::get('docs/responses/get/{response}', 'UserDocsController@getResponse');
    Route::delete('docs/responses/delete/{response}', 'UserDocsController@deleteResponse');
    Route::post('docs/responses/{res}', 'UserDocsController@update');
    Route::get('docs/responses/{res}', function($res){
        return redirect()->route('admin.response');
    });

    Route::get('docs/new', 'DocsController@create')->name('docs.new');
    Route::get('docs/{userform}', 'DocsController@choose')->name('docs.choose');
    Route::delete('docs/{userform}/delete', 'DocsController@delete')->name('docs.delete');    
});

Route::get('form/{link:link}', 'UserDocsController@index');
Route::post('form/{link:link}/submit', 'UserDocsController@submit');

