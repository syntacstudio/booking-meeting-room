<?php
Route::get('/', function() {
    return view('welcome');
});

// routes for public
Route::get('/', 'PageController@welcome' )->name('home');
Route::get('/browse', 'RoomController@browse' )->name('browse');
Route::get('/room/{permalink}', 'RoomController@detail' )->name('room');
Route::get('/invoice/{number}', 'AccountController@invoice')->name('account.invoice');

Auth::routes();

// routes for admin
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/bookings', 'Admin\BookingController@index')->name('admin.bookings');
    Route::get('/admin/booking/{$id}', 'Admin\BookingController@detail')->name('admin.booking');

    Route::get('/admin/rooms', 'Admin\RoomController@index')->name('admin.rooms');
    Route::get('/admin/room/create', 'Admin\RoomController@create')->name('admin.room.create');
    Route::get('/admin/room/{id}/edit/', 'Admin\RoomController@edit')->name('admin.room.edit');
    Route::get('/admin/room/{id}/destroy', 'Admin\RoomController@destroy')->name('admin.room.destroy');

    Route::get('/admin/customers', 'Admin\CustomerController@index')->name('admin.customers');

    //post routes
    Route::post('/admin/room/{id}/update', 'Admin\RoomController@update')->name('admin.room.update');
    Route::post('/admin/room/store', 'Admin\RoomController@store')->name('admin.room.store');
});

// routes for user
Route::middleware(['auth', 'roles:customer,admin'])->group(function () {
    Route::get('/account', 'AccountController@bookings')->name('account');
    Route::post('/account/update', 'AccountController@update')->name('account.update');
    Route::post('/account/update/password', 'AccountController@updatePassword')->name('account.updatePassword');
    Route::get('/settings', 'AccountController@settings')->name('account.settings');
    
    Route::get('/booking/{permalink}', 'BookingController@create')->name('booking');
    Route::post('/booking/validation', 'BookingController@validation');
    Route::post('/booking/store', 'BookingController@store');
});