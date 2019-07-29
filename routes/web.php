<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::group(array('prefix' => 'advertisement'), function () {
    Route::get('/create', 'AdvertisementController@create');
    Route::post('/create', 'AdvertisementController@store')->name('create-advertisement');
    Route::get('/show/{slug}', 'AdvertisementController@show')->name('show-advertisement');
    Route::get('/{id}/edit', 'AdvertisementController@edit')->name('edit-advertisement');
    Route::get('/list', 'AdvertisementController@index')->name('advertisement-list');
    Route::get('/photo/{id}/delete', 'AdvertisementController@deletePhoto')->name('delete-photo');
    Route::put('/update/{id}', 'AdvertisementController@update')->name('update-advertisement');
});

Route::post('/send-message', 'ContactController@store')->name('send-message');