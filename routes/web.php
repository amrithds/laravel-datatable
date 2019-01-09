<?php

Route::get('/surveys/data', 'SurveysController@data')->name('surveys.data');

Route::resource('/surveys', 'SurveysController');

Route::post('/surveys/users', 'SurveysController@users')->name('surveys.users');

Route::get('/users', 'UsersController@index')->name('users.index');

Route::get('/users/data', 'UsersController@data')->name('users.data');


Route::get('/', 'SurveysController@index')->name('homepage');

