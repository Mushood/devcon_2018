<?php

Route::get('/', 'PageController@welcome')->name('welcome');

Route::get('/about', 'PageController@about')->name('about');