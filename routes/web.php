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
Route::get('/showListing', 'PagesController@showListing');
Route::get('/listings', 'PagesController@listing');
Route::get('/listing/{id}', 'UploadController@show');

Route::get('/users', 'PagesController@user');
Route::get('/users/edit', 'PagesController@editUser');
Route::get('/users/{id}', 'PagesController@showUser');

// For use in Yajra Data-table
// Route::get('/users', 'UserController@viewUsers');
// Route::get('/users/list', 'UserController@getUsers')->name('users.list');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::middleware('auth.admin')->group(function () {
    Route::get('/upload', 'UploadController@create')->name('upload.create');
    Route::post('/upload', 'UploadController@store')->name('upload.store');
    Route::get('/listing/{id}/edit', 'UploadController@edit')->name('upload.edit');
    Route::post('/listing/{id}/edit', 'UploadController@update')->name('upload.update');
});
