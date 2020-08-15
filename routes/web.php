<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'StaticPagesController@index')->name('index');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::resource('users', 'UsersController');
Route::get('users/activate/{token}', 'UsersController@activate')->name('users.activate');
Route::post('users/{user}/upload_avatar', 'UsersController@uploadAvatar')->name('users.uploadAvatar');

Route::get('sessions/create', 'SessionsController@create')->name('sessions.create');
Route::post('sessions/store', 'SessionsController@store')->name('sessions.store');
Route::delete('sessions/destroy', 'SessionsController@destroy')->name('sessions.destroy');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
