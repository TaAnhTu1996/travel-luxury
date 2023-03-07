<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@index')->name('admin')->middleware('auth');
Route::group(['as' => 'user.', 'middleware' => 'auth'], function () {
    Route::get('user/edit/{id}', 'UserController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('user/store', 'UserController@store')->name('store')->middleware('can:User.Store');
    Route::delete('user/destroy/{id}', 'UserController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('user', 'UserController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy',
    ]);
});
