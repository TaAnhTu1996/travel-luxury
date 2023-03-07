<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
Route::get('/library', 'HomeController@library')->name('library');
Route::get('/customer-review', 'HomeController@customerReview')->name('customer-review');
Route::get('/blog-review/{id}', 'HomeController@blogReview')->name('blog-review');
Route::get('/tour-detail/{id}', 'HomeController@tourDetail')->name('tour-detail');
Route::get('/tour-list/{id}', 'HomeController@tourList')->name('tour-list');
Route::get('/check-out', 'HomeController@checkOut')->name('check-out');
Route::post('/session-booking', 'HomeController@sessionBooking')->name('session-booking');
Route::get('customer-review-create', 'HomeController@customerReviewCreate')->name('customer-review-create');

