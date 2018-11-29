<?php
Route::get('/', function() {
    return view('welcome');
});

// routes of pages
Route::get('/', 'PageController@welcome' )->name('home');
Route::get('/browse', 'PageController@browse' )->name('browse');

Auth::routes();

// routes for admin
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/bookings', 'Admin\BookingController@index')->name('admin.bookings');
    Route::get('/admin/booking/{$id}', 'Admin\BookingController@detail')->name('admin.booking');

    Route::get('/admin/rooms', 'Admin\RoomController@index')->name('admin.rooms');
    Route::get('/admin/room/{$id}', 'Admin\RoomController@detail')->name('admin.room');
    Route::get('/admin/room/new', 'Admin\RoomController@new')->name('admin.room.new');
    Route::post('/admin/room/store', 'Admin\RoomController@store')->name('admin.room.store');
});

// routes for user
Route::middleware(['auth', 'roles:user'])->group(function () {
    Route::get('/user', 'UserController@index')->name('user');
});