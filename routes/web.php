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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', 'PagesController@contact');
/*
Route::get('articles', 'ArticleController@index');
Route::get('articles/create', 'ArticleController@create');
Route::get('articles/{id}', 'ArticleController@show')->where('id', '[0-9]+');
Route::post('articles', 'ArticleController@store');*/

Route::resource('articles', 'ArticleController');



Auth::routes();

Route::get('/home', 'HomeController@index');
