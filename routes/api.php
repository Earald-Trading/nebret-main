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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

Route::get('/listings', 'UploadController@index')->name('listings');
Route::get('/listings/{id}', 'UploadController@show')->name('listings.show');

Route::middleware('auth:api')->group(function () {
    Route::get('/listings/{id}/like', 'UploadController@like')->name('listings.like');
    Route::get('/preferences', 'UserController@edit')->name('user.edit');
    Route::post('/preferences', 'UserController@update')->name('user.update');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::get('/likes', 'UserController@likes')->name('user.likes');
    Route::get('/lists', 'UserController@listings')->name('user.listings');
    Route::get('/request', 'PagesController@userRequest')->name('uploadRequest.create');
    Route::post('/request', 'PagesController@emailAdmin')->name('uploadRequest.store');
});
