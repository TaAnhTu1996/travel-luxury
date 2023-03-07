<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'customer-review.'], function () {
    Route::get('customer-review/edit/{id}', 'CustomerReviewController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('customer-review/store', 'CustomerReviewController@store')->name('store')->middleware('can:User.Store');
    Route::delete('customer-review/destroy/{id}', 'CustomerReviewController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('customer-review', 'CustomerReviewController')->names([
            'index' => 'index',
            'create' => 'create',
            'update' => 'update',
            'show' => 'show',
        ]);
    });
});
