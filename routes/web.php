<?php

Route::get('/', 'PageController@welcome')->name('welcome');

Route::get('/about', 'PageController@about')->name('about');

Route::get('/contact', 'PageController@contact')->name('contact');

Route::get('/post', 'PageController@post')->name('post');