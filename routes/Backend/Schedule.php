<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'schedule.', 'middleware' => 'auth'], function () {
    Route::get('schedule/edit/{id}', 'ScheduleController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('schedule/store', 'ScheduleController@store')->name('store')->middleware('can:User.Store');
    Route::delete('schedule/destroy/{id}', 'ScheduleController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('schedule', 'ScheduleController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy'
    ]);
});
