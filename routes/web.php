<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace' => 'Backend', 'as' => 'backend.', 'prefix' => '/admin'], function () {
    includeRouteFiles(__DIR__ . '/Backend/');
});
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.', 'prefix' => '/'], function () {
    includeRouteFiles(__DIR__ . '/Frontend/');
});

Auth::routes();
Auth::routes(['verify' => true]);
// auth
Route::prefix('customer')->as('customer.')->group(function () {
    Route::namespace('Auth\Customer')->group(function () {
        Route::get('/login', 'LoginController@showFormLogin')->name('login');
        Route::post('/login', 'LoginController@login')->name('login');
        Route::get('/register', 'RegisterController@showFormRegister')->name('register');
        Route::post('/register', 'RegisterController@register');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        Route::get('/redirect', 'LoginController@redirectToProvider')->name('customer-redirect');
        Route::get('/callback', 'LoginController@handleProviderCallback');

        Route::get('/forgot-password', 'ForgotPasswordController@showFormForgotPassword')->name('forgot-password');
        Route::post('/forgot-password', 'ForgotPasswordController@forgotPassword')->name('forgot-password');
        Route::get('/reset-password', 'ForgotPasswordController@showFormResetPassword')->name('reset-password');
        Route::post('/reset-password', 'ForgotPasswordController@resetPassword')->name('reset-password');

        Route::get('/profile', 'ProfileController@showFormProfile')->name('profile');
        Route::get('/history', 'HistoryController@showHistory')->name('history');
        Route::post('/update-profile/{id}', 'ProfileController@profile')->name('update-profile');
    });
});
Route::post('/auth/logout', 'Auth\AuthController@logout')->name('auth.logout');
