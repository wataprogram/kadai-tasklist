<?php

//トップページ
Route::get('/', function () {
    return view('welcome');
});

//ユーザー機能
Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', 'TasksController', ['only' => 'index']);
});

//ログイン機能

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');


Route::get('tasks', 'TasksController@index');
Route::resource('tasks', 'TasksController');
