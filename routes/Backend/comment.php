<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'comment.', 'middleware' => 'auth'], function () {
    Route::get('comment/edit/{id}', 'CommentController@edit')->name('edit')->middleware('can:User.Edit');
    Route::post('comment/store', 'CommentController@store')->name('store')->middleware('can:User.Store');
    Route::delete('comment/destroy/{id}', 'CommentController@destroy')->name('destroy')->middleware('can:User.Destroy');
    Route::resource('comment', 'CommentController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy'
    ]);
});
