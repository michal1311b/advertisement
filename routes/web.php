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

Route::get('/advertisement/create', 'AdvertisementController@create');
Route::post('/advertisement/create', 'AdvertisementController@store')->name('create-advertisement');
Route::get('/advertisement/show/{slug}', 'AdvertisementController@show')->name('show-advertisement');
Route::get('/advertisement/{id}/edit', 'AdvertisementController@edit')->name('edit-advertisement');
Route::get('/advertisement/list', 'AdvertisementController@index');
Route::get('/advertisement/photo/{id}/delete', 'AdvertisementController@deletePhoto')->name('delete-photo');
Route::put('/advertisement/update/{id}', 'AdvertisementController@update')->name('update-advertisement');