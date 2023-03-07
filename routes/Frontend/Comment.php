<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'comment.', 'middleware' => 'auth'], function () {
    Route::resource('comment', 'CommentController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy',
    ]);
});
