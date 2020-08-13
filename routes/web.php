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

Route::post('users/{user}/upload_avatar', 'UsersController@uploadAvatar')->name('users.uploadAvatar');
Route::resource('users', 'UsersController');
Route::get('users/activate/{token}', 'UsersController@activate')->name('users.activate');

Route::get('sessions/create', 'SessionsController@create')->name('sessions.create');
Route::post('sessions/store', 'SessionsController@store')->name('sessions.store');
Route::delete('sessions/destroy', 'SessionsController@destroy')->name('sessions.destroy');
