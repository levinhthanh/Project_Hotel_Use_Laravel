<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();


//Logout
Route::get('/home', function () {
    return view('welcome');
});

// USER ROUTE
Route::get('/', 'GuestController@index')->name('welcome');
Route::get('/categories', 'GuestController@view_categories')->name('view_categories');
Route::get('/category/{id}', 'GuestController@view_category')->name('view_category');

// ADMIN ROUTE
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        if(Auth::user()->type === 'Admin'){
            return view('admin.home');
        }
        else{
            //page lỗi
        }
    })->name('admin_page');
    Route::get('/employee', 'AdminController@manager_employee')->name('manager_employee');
    Route::get('/category', 'AdminController@manager_category')->name('manager_category');
    Route::get('/room', 'AdminController@manager_room')->name('manager_room');
});


// Route::get('/home', 'HomeController@index')->name('home');




