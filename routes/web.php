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

Route::get('/', 'PagesController@index');
Route::get('/images/{id}/{number}', 'PagesController@image')->name('images');

Route::get('/survey', 'PagesController@survey');

// Temporary
Route::get('/listings', 'UploadController@index');
Route::get('/listings/{id}', 'UploadController@show');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/preferences', 'UserController@edit')->name('user.edit');
    Route::post('/preferences', 'UserController@update')->name('user.update');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
});

Route::middleware('auth.agent')->group(function () {
    Route::get('/upload', 'UploadController@create')->name('upload.create');
    Route::post('/upload', 'UploadController@store')->name('upload.store');

    Route::get('/listings/{id}/edit', 'UploadController@edit')->name('upload.edit');
    Route::post('/listings/{id}/edit', 'UploadController@update')->name('upload.update');
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}', 'UserController@show')->name('users.show');
    Route::post('/users/{id}/edit', 'UserController@update')->name('users.update');
});
