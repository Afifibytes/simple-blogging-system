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

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/new', 'ArticlesController@new');
Route::post('/articles/save', ['as' => 'article.save', 'uses' => 'ArticlesController@save']);

Route::post('/comments/save', ['as' => 'comment.save', 'uses' => 'CommentController@save']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
