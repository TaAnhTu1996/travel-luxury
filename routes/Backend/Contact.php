<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'contact.'], function () {
    Route::resource('contact', 'ContactController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy',
    ]);
});
