<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/employee')->group(function () {
    Route::get('/', 'AdminController@get_employees')->name('get_employees');
    Route::post('/', 'AdminController@validate_employee')->name('validate_employee');
    Route::get('/{id}', 'AdminController@get_employee')->name('get_employee');
    Route::post('/update', 'AdminController@update_employee')->name('update_employee');
    Route::delete('/{id}', 'AdminController@delete_employee')->name('delete_employee');
});

Route::prefix('/category')->group(function () {
    Route::get('/', 'AdminController@get_categories')->name('get_categories');
    Route::post('/', 'AdminController@validate_category')->name('validate_category');
    Route::get('/{id}', 'AdminController@get_category')->name('get_category');
    Route::post('/update', 'AdminController@update_category')->name('update_category');
    Route::delete('/{id}', 'AdminController@delete_category')->name('delete_category');
});

Route::prefix('/room')->group(function () {
    Route::get('/', 'AdminController@get_rooms')->name('get_rooms');
    Route::post('/', 'AdminController@validate_room')->name('validate_room');
    Route::get('/{id}', 'AdminController@get_room')->name('get_room');
    Route::post('/update', 'AdminController@update_room')->name('update_room');
    Route::delete('/{id}', 'AdminController@delete_room')->name('delete_room');
});

Route::prefix('/book')->group(function () {
    Route::get('/checked/{id}', 'GuestController@checked')->name('checked');

});

