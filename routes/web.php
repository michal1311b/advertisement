<?php
use App\Events\WebsocketDemoEvent;
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

Route::post('/subscribe', 'SubscriberController@store')->name('subscribe');

Route::get('/verify/subscribtion/{token}', [
    'uses' => 'SubscriberController@verify'
]);

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::group(array('prefix' => 'offer'), function () {
    Route::get('/create', 'AdvertisementController@create')->name('create-advertisement')->middleware(['auth', 'verified']);
    Route::post('/create', 'AdvertisementController@store')->name('store-advertisement')->middleware(['auth', 'verified']);
    Route::get('/show/{slug}', 'AdvertisementController@show')->name('show-advertisement')->middleware(['auth', 'verified']);
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
    Route::get('/offers', 'UserController@getUserAdvertisements')->name('user-advertisement-list')->middleware(['auth', 'verified']);
    Route::get('/offer/show/{slug}', 'UserController@showUserAdvertisement')->name('user-advertisement-show')->middleware(['auth', 'verified']);
    Route::get('/contacts', 'ReplyController@index')->name('user-contact')->middleware(['auth', 'verified']);
    Route::get('/contacts/{id}/reply', 'ReplyController@showReply')->name('user-reply')->middleware(['auth', 'verified']);
    Route::post('/send-reply', 'ReplyController@sendReply')->name('send-reply')->middleware(['auth', 'verified']);
    Route::post('/add-experience/{user}', 'ExperienceController@store')->name('store-experience')->middleware(['auth', 'verified']);
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


Route::group(['prefix' => 'admin'], function () {
    Route::resource('posts', 'PostController')->middleware(['auth', 'admin', 'verified']);
    Route::resource('categories', 'CategoryController')->middleware(['auth', 'admin', 'verified']);
    Route::get('/email-manager', [
        'uses' => 'EmailController@getIndex'
    ])->middleware(['auth', 'admin', 'verified'])->name('mailTracker_Index');
    Route::post('/seach', [
        'uses' => 'EmailController@postSearch'
    ])->middleware(['auth', 'admin', 'verified'])->name('mailTracker_Search');
    Route::get('/clear', [
        'uses' => 'EmailController@clearSearch'
    ])->middleware(['auth', 'admin', 'verified'])->name('mailTracker_ClearSearch');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

Route::group(array('prefix' => 'blog'), function () {
    Route::get('/list', 'BlogController@index')->name('blog.index');
    Route::get('/show/{slug}', 'BlogController@show')->name('blog.show');
    Route::get('/tag/{tagSlug}/{page?}', [
        'as' => 'postTag',
        'uses' => 'TagController@showPost'
    ]);

    Route::post('/comment-post', 'CommentController@store')->name('comment-post');
});

