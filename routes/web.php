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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::group(array('prefix' => 'advertisement'), function () {
    Route::get('/create', 'AdvertisementController@create')->name('create-advertisement');
    Route::post('/create', 'AdvertisementController@store')->name('store-advertisement')->middleware(['auth', 'verified']);
    Route::get('/show/{slug}', 'AdvertisementController@show')->name('show-advertisement');
    Route::get('/{id}/edit', 'AdvertisementController@edit')->name('edit-advertisement')->middleware(['auth', 'verified']);
    Route::get('/{id}/delete', 'AdvertisementController@delete')->name('delete-advertisement');
    Route::get('/list', 'AdvertisementController@index')->name('advertisement-list');
    Route::get('/photo/{id}/delete', 'AdvertisementController@deletePhoto')->name('delete-photo');
    Route::put('/update/{id}', 'AdvertisementController@update')->name('update-advertisement');
    Route::get('/email', 'AdvertisementController@sendEmail');
    Route::any('/search', 'AdvertisementController@search')->name('search-advertisement');
    Route::get('/tag/{tagSlug}/{page?}', [
        'as' => 'advertisementTag',
        'uses' => 'TagController@show'
    ]);
    Route::get('/tag/{tagSlug}/a/{articleSlug}', [
        'as' => 'advertisementTagArticle',
        'uses' => 'TagController@showArticle'
    ]);
    Route::post('users/{user}/follow', 'UserController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UserController@unfollow')->name('unfollow');
    Route::get('notifications', 'UserController@notifications');
    
});

Route::group(array('prefix' => 'user'), function () {
    Route::get('/{id}/edit', 'UserController@edit')->name('edit-user')->middleware(['auth', 'verified']);
    Route::put('/update/{id}', 'UserController@update')->name('update-user');
    Route::get('/advertisements', 'UserController@getUserAdvertisements')->name('user-advertisement-list')->middleware(['auth', 'verified']);
    Route::get('/advertisement/show/{slug}', 'UserController@showUserAdvertisement')->name('user-advertisement-show')->middleware(['auth', 'verified']);
});

Route::post('/send-message', 'ContactController@store')->name('send-message');