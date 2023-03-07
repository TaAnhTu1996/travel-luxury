<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'image-library.', 'middleware' => 'auth'], function () {
    Route::get('image-library/edit/{id}', 'ImageLibraryController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('image-library/store', 'ImageLibraryController@store')->name('store')->middleware('can:User.Store');
    Route::delete('image-library/destroy/{id}', 'ImageLibraryController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('image-library', 'ImageLibraryController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy'
    ]);
});
