<?php

Route::get('/', 'PostController@index')->name('home');
Route::get('/create','PostController@create');
Route::post('/create','PostController@store');
Route::get('/posts/{id}','PostController@details');

Route::post('/posts/{id}/comments','CommentsController@store' );

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');

