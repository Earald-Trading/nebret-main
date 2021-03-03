<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PagesController@index')->name('homepage');
Route::get('/images/{id}/{number?}', 'PagesController@image')->name('images');

Route::get('/survey', 'PagesController@survey')->name('survey');

Route::get('/about', 'PagesController@about')->name('about');

// Temporary
Route::get('/listings', 'UploadController@index')->name('listings');
Route::get('/listings/{id}', 'UploadController@show')->name('listings.show');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/listings/{id}/like', 'UploadController@like')->name('listings.like');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/preferences', 'UserController@edit')->name('user.edit');
    Route::post('/preferences', 'UserController@update')->name('user.update');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::get('/likes', 'UserController@likes')->name('user.likes');
    Route::get('/lists', 'UserController@listings')->name('user.listings');
});

Route::middleware('auth.agent')->group(function () {
    Route::get('/upload', 'UploadController@create')->name('listings.create');
    Route::post('/upload', 'UploadController@store')->name('listings.store');

    Route::get('/listings/{id}/edit', 'UploadController@edit')->name('listings.edit');
    Route::post('/listings/{id}/edit', 'UploadController@update')->name('listings.update');
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}', 'UserController@show')->name('users.show');
    Route::get('/users/{id}/likes', 'UserController@likes')->name('users.likes');
    Route::get('/users/{id}/listings', 'UserController@listings')->name('users.likes');
    Route::post('/users/{id}/edit', 'UserController@update')->name('users.update');
});
