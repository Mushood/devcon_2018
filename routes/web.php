<?php

Route::get('/', 'PageController@welcome')->name('welcome');

Route::get('/about', 'PageController@about')->name('about');

Route::get('/contact', 'PageController@contact')->name('contact');

Route::get('/post', 'PageController@post')->name('post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/article/create', 'ArticleController@create')->name('article.create')->middleware('auth');
Route::post('/article', 'ArticleController@store')->name('article.store')->middleware('auth');
Route::get('/articles', 'ArticleController@index')->name('article.index');
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
Route::get('/article/{article}/edit', 'ArticleController@edit')->name('article.edit')->middleware('auth');
Route::put('/article/{article}', 'ArticleController@update')->name('article.update')->middleware('auth');
