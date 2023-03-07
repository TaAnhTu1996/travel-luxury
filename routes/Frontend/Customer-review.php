<?php
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'customer-review.', 'middleware' => 'auth'], function () {
    Route::resource('customer-review', 'CustomerReviewController')->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'edit' => 'edit',
        'update' => 'update',
        'show' => 'show',
        'destroy' => 'destroy',
    ]);
});
