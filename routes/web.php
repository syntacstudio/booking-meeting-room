<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// routes for admin
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
});

// routes for user
Route::middleware(['auth', 'roles:user'])->group(function () {
    Route::get('/user', 'UserController@index')->name('user');
});

// routes for both roles
Route::middleware(['auth', 'roles:admin,user'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
