<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'tour.', 'middleware' => 'auth'], function () {
    Route::get('tour/edit/{id}', 'TourController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('tour/store', 'TourController@store')->name('store')->middleware('can:User.Store');
    Route::delete('tour/destroy/{id}', 'TourController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('tour', 'TourController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy'
    ]);
});
