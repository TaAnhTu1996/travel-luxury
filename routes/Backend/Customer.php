<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'customer.', 'middleware' => 'auth'], function () {
    Route::get('customer/edit/{id}', 'CustomerController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('customer/store', 'CustomerController@store')->name('store')->middleware('can:User.Store');
    Route::delete('customer/destroy/{id}', 'CustomerController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('customer', 'CustomerController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy'
    ]);
});
