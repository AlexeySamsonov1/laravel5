<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', 'PagesController@contact');
/*
Route::get('articles', 'ArticleController@index');
Route::get('articles/create', 'ArticleController@create');
Route::get('articles/{article_id}', 'ArticleController@show')->where('id', '[0-9]+');
Route::post('articles', 'ArticleController@store');*/

Route::resource('articles', 'ArticleController');
Route::get('tags/{tag}', 'TagsController@show');


Auth::routes();

Route::get('/home', 'HomeController@index');

// Comments.
Route::get('articles/{article}/comment/create', 'CommentController@create')->name('comment.create');
Route::post('articles/{article}/comments', 'CommentController@store')->name('comment.store');
Route::get('comment/{comment}/edit', 'CommentController@edit')->name('comment.edit');
Route::patch('comment/{comment}', 'CommentController@update')->name('comment.update');
