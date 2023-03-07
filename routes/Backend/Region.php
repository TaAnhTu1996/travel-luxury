<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'region.', 'middleware' => 'auth'], function () {
    Route::get('region/edit/{id}', 'RegionController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('region/store', 'RegionController@store')->name('store')->middleware('can:User.Store');
    Route::delete('region/destroy/{id}', 'RegionController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('region', 'RegionController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy'
    ]);
});
