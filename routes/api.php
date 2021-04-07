<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'AuthController@register')->name('api.register');
Route::post('/login', 'AuthController@login')->name('api.login');

Route::get('/listings', 'UploadController@index')->name('api.listings');
Route::get('/listings/{id}', 'UploadController@show')->name('api.listings.show');

Route::middleware('auth:api')->group(function () {
    Route::get('/listings/{id}/like', 'UploadController@like')->name('api.listings.like');
    Route::get('/preferences', 'UserController@edit')->name('api.user.edit');
    Route::post('/preferences', 'UserController@update')->name('api.user.update');
    Route::get('/profile', 'UserController@profile')->name('api.user.profile');
    Route::get('/likes', 'UserController@likes')->name('api.user.likes');
    Route::get('/lists', 'UserController@listings')->name('api.user.listings');
    Route::get('/request', 'PagesController@userRequest')->name('api.uploadRequest.create');
    Route::post('/request', 'PagesController@emailAdmin')->name('api.uploadRequest.store');
});
