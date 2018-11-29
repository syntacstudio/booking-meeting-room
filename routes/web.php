<?php
Route::get('/', function() {
    return view('welcome');
});

// routes of pages
Route::get('/', 'PageController@welcome' )->name('home');

Auth::routes();

// routes for admin
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
});

// routes for user
Route::middleware(['auth', 'roles:user'])->group(function () {
    Route::get('/user', 'UserController@index')->name('user');
});