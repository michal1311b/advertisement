<?php
<<<<<<< HEAD
use App\Events\WebsocketDemoEvent;
=======

>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
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
<<<<<<< HEAD
    broadcast(new WebsocketDemoEvent('some data'));

    return view('welcome');
});

Route::post('/push','PushController@store');
Route::get('/push','PushController@push')->name('push');

Route::get('/chats', 'ChatsController@index');

Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/nagrody-ankieta', 'SubscriberController@index')->name('subscribers1');

Route::put('accept/{subscriber}', [
    'uses' => 'SubscriberController@updatePrice'
])->middleware('auth')->name('get-price');

Route::get('/search', [
    'uses' =>  'SubscriberController@search'
])->name('search-code');

Route::get('/nagrody-suby', 'Subscriber2Controller@index')->name('subscribers2');

Route::put('accept2/{subscriber2}', [
    'uses' => 'Subscriber2Controller@updatePrice'
])->middleware('auth')->name('get-price2');

Route::get('/search2', [
    'uses' =>  'Subscriber2Controller@search'
])->name('search-code2');
=======
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
    Route::get('users', 'UserController@read')->name('read');
});

Route::group(array('prefix' => 'user'), function () {
    Route::get('/{id}/edit', 'UserController@edit')->name('edit-user')->middleware(['auth', 'verified']);
    Route::put('/update/{id}', 'UserController@update')->name('update-user');
    Route::get('/advertisements', 'UserController@getUserAdvertisements')->name('user-advertisement-list')->middleware(['auth', 'verified']);
    Route::get('/advertisement/show/{slug}', 'UserController@showUserAdvertisement')->name('user-advertisement-show')->middleware(['auth', 'verified']);
    Route::get('/contacts', 'ReplyController@index')->name('user-contact')->middleware(['auth', 'verified']);
    Route::get('/contacts/{id}/reply', 'ReplyController@showReply')->name('user-reply')->middleware(['auth', 'verified']);
    Route::post('/send-reply', 'ReplyController@sendReply')->name('send-reply')->middleware(['auth', 'verified']);
});

Route::post('/send-message', 'ContactController@store')->name('send-message');

Route::group(array('prefix' => 'questionnaire'), function () {
    Route::get('/create', 'QuestionnaireController@create')->name('questionnaire.create');
    Route::post('/create', 'QuestionnaireController@store')->name('questionnaire.store');
});

Route::group(array('prefix' => 'language'), function () {
    Route::get('/create', 'LanguageController@create')->name('language.create');
    Route::post('/create', 'LanguageController@store')->name('language.store');
    Route::get('/list', 'LanguageController@index')->name('language.index');
    Route::get('/{lang_key}/edit', 'LanguageController@edit')->name('language.edit');
    Route::patch('/{lang_key}/update', 'LanguageController@update')->name('language.update');
    Route::delete('/{lang_key}/delete', 'LanguageController@destroy')->name('language.delete');
});
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
