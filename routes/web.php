<?php

Route::get('/', 'PageController@welcome')->name('welcome');

Route::get('/about', 'PageController@about')->name('about');

Route::get('/contact', 'PageController@contact')->name('contact');

Route::get('/post', 'PageController@post')->name('post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/file-upload', 'PageController@uploadFile')->name('upload');

Route::get('/article/create', 'ArticleController@create')->name('article.create')->middleware('auth');
Route::post('/article', 'ArticleController@store')->name('article.store')->middleware('auth');
Route::get('/articles', 'ArticleController@index')->name('article.index');
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
Route::get('/article/{article}/edit', 'ArticleController@edit')->name('article.edit')->middleware('auth', 'can:edit,article');
Route::put('/article/{article}', 'ArticleController@update')->name('article.update')->middleware('auth', 'can:update,article');

Route::get('/email/article/created', 'EmailController@articleCreated')->name('article.create.email');