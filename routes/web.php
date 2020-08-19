<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

// USER ROUTE
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/', 'GuestController@index')->name('welcome');
Route::get('/categories', 'GuestController@view_categories')->name('view_categories');
Route::get('/category/{id}', 'GuestController@view_category')->name('view_category');
Route::post('/booking', 'GuestController@view_booking')->name('view_booking');
Route::get('/booking', 'GuestController@view_booking_page')->name('view_booking_page');
Route::post('/check_rooms', 'GuestController@check_rooms')->name('check_rooms');
Route::get('/check_rooms', 'GuestController@view_check_rooms')->name('view_check_rooms');
Route::post('/select/{id}', 'GuestController@select_room')->name('select_room');
Route::post('/unselect/{id}', 'GuestController@unselect_room')->name('unselect_room');
Route::get('/confirm', 'GuestController@confirm_info')->name('confirm_info');
Route::post('/validate', 'GuestController@validate_customer')->name('validate_customer');
Route::post('/finish', 'GuestController@finish_booking')->name('finish_booking');


// ADMIN ROUTE
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        if (Auth::check()) {
            return view('admin.home');
        } else {
            return view('auth.login');
        }
    })->name('admin_page');
    Route::get('/employee', 'AdminController@manager_employee')->name('manager_employee');
    Route::get('/category', 'AdminController@manager_category')->name('manager_category');
    Route::get('/room', 'AdminController@manager_room')->name('manager_room');
    Route::get('/booking', 'AdminController@manager_booking')->name('manager_booking');
    Route::get('/receive', 'AdminController@manager_receive')->name('manager_receive');
    Route::get('/repay', 'AdminController@manager_repay')->name('manager_repay');
    Route::get('/print', 'AdminController@manager_print_bill')->name('manager_print_bill');
});



