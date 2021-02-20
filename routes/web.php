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

// Temporary
Route::get('/showListing', 'PagesController@showListing');
Route::get('/listings', 'PagesController@listing');
Route::get('/listing/{id}', 'UploadController@show');

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
