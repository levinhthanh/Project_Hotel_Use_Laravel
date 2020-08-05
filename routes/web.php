<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

//Start
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'GuestController@index')->name('welcome');
//Logout
Route::get('/home', function () {
    return view('welcome');
});

// ADMIN ROUTE
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        if(Auth::user()->type === 'admin'){
            return view('admin.home');
        }
        else{
            //page lỗi
        }
    })->name('admin_page');
    Route::get('/employee', 'AdminController@manager_employee')->name('manager_employee');

    // Route::get('/employee/add', 'AdminController@add_employee')->name('add_employee');
    // Route::get('/employee/list', 'AdminController@list_employee')->name('list_employee');
    // Route::post('/employee/add', 'AdminController@validate_employee')->name('validate_employee');
    // Route::get('/get_employee', 'AdminController@get_employee')->name('get_employee');
});


// Route::get('/home', 'HomeController@index')->name('home');




