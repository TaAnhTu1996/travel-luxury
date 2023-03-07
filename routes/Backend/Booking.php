<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'booking.'], function () {
    Route::post('booking/store', 'BookingController@store')->name('store');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('booking/edit/{id}', 'BookingController@edit')->name('edit')->middleware('can:User.Edit');
        Route::get('booking/mail-tour-finish/{id}', 'BookingController@mailTourFinish')->name('mail-tour-finish')->middleware('can:User.Edit');
        Route::get('booking/mail-tour-success/{id}', 'BookingController@mailTourSuccess')->name('mail-tour-success')->middleware('can:User.Edit');
        Route::delete('booking/destroy/{id}', 'BookingController@destroy')->name('destroy')->middleware('can:User.Destroy');
        Route::resource('booking', 'BookingController')->names([
            'index' => 'index',
            'create' => 'create',
            'edit' => 'edit',
            'update' => 'update',
            'show' => 'show',
            'destroy' => 'destroy'
        ]);
    });
});
