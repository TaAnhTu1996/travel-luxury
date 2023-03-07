<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'setting.', 'middleware' => 'auth'], function () {
    Route::get('setting/edit/{id}', 'SettingController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('setting/store', 'SettingController@store')->name('store')->middleware('can:User.Store');
    Route::delete('setting/destroy/{id}', 'SettingController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('setting', 'SettingController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy'
    ]);
});
