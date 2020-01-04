<?php

use Spatie\Honeypot\ProtectAgainstSpam;
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
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap.xml/offers', 'SitemapController@offers');
Route::get('/sitemap.xml/posts', 'SitemapController@posts');
Route::get('/sitemap.xml/pins', 'SitemapController@pins');
Route::get('/sitemap.xml/tags', 'SitemapController@tags');
Route::get('/sitemap.xml/companies', 'SitemapController@companies');

Route::get('/', 'PageController@siteIndex')->name('homepage');

Route::get('/rejestracja-krok', 'Auth\RegisterController@showStep')->name('register.step');
Route::get('/rejestracja-firma', 'Auth\RegisterController@showRegisterCompany')->name('register.company');
Route::post('/rejestracja-firma', 'Auth\RegisterController@registerCompany')->name('register.company.post');

Route::get('lang/{locale}', 'LanguageController@lang')->name('locale');

Route::post('/subscribe', 'SubscriberController@store')->name('subscribe')->middleware(ProtectAgainstSpam::class);

Route::get('/send-newsletter', 'NewsletterController@send')->name('newsletter.send');

Route::get('/ankieta-na-temat-pracy-lekarza', 'StaticQuestionnaireController@show')->name('static.questionnaire.show');
Route::post('/ankieta-na-temat-pracy-lekarza', 'StaticQuestionnaireController@store')->name('static.questionnaire.store');

Route::get('/send-job-alert', 'PreferenceController@sendJobAlert')->name('send.job.alert');

Route::get('/polityka-cookies', 'PageController@cookies')->name('cookies.show');
Route::get('/regulamin', 'PageController@showRegulation')->name('regulation.show');
Route::get('/kontakt', 'ContactController@show')->name('contact.show');
Route::post('/kontakt', 'ContactController@sendForm')->name('contact.store')->middleware(ProtectAgainstSpam::class);

Route::get('/verify/subscribtion/{token}', [
    'uses' => 'SubscriberController@verify'
]);

Route::get('/build-preferences', 'PreferenceController@buildPreferences')->name('build-preferences');

//Allows to overwrite login and register actions
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('{slug}', 'PageController@siteShow')->name('site.page');
Route::get('/company/{user}/show', 'CompanyController@show')->name('company-show');
Route::get('/company/list', 'CompanyController@index')->name('company-list');

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
    Route::post('/create', 'AdvertisementController@store')->name('store-advertisement');
    Route::get('/show/{id}/{slug}', 'AdvertisementController@show')->name('show-advertisement')->middleware(['auth', 'verified']);
    Route::get('/{id}/edit', 'AdvertisementController@edit')->name('edit-advertisement')->middleware(['auth', 'verified']);
    Route::delete('/{id}/delete', 'AdvertisementController@delete')->name('delete-advertisement');
    Route::get('/list', 'AdvertisementController@index')->name('advertisement-list');
    Route::get('/photo/{id}/delete', 'AdvertisementController@deletePhoto')->name('delete-photo');
    Route::post('/{id}/update', 'AdvertisementController@update')->name('update-advertisement');
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
    Route::get('/{user}/edit', 'UserController@edit')->name('edit-user')->middleware(['auth', 'verified']);
    Route::put('/update/{user}', 'UserController@update')->name('update-user');
    Route::get('/offers', 'UserController@getUserAdvertisements')->name('user-advertisement-list')->middleware(['auth', 'verified']);
    Route::get('/offer/show/{advertisement}/{slug}', 'UserController@showUserAdvertisement')->name('user-advertisement-show')->middleware(['auth', 'verified']);
    Route::get('/contacts', 'ReplyController@index')->name('user-contact')->middleware(['auth', 'verified']);
    Route::get('/contacts/{id}/reply', 'ReplyController@showReply')->name('user-reply')->middleware(['auth', 'verified']);
    Route::post('/send-reply', 'ReplyController@sendReply')->name('send-reply')->middleware(['auth', 'verified']);
    Route::post('/experience/{user}', 'ExperienceController@store')->name('store-experience')->middleware(['auth', 'verified']);
    Route::post('/course/{user}', 'CourseController@store')->name('store-course')->middleware(['auth', 'verified']);
    Route::delete('/experience/{experience}/delete', 'ExperienceController@delete')->name('delete-experience');
    Route::put('/experience/{experience}', 'ExperienceController@update')->name('update-experience');
    Route::put('/course/{course}', 'CourseController@update')->name('update-course');
    Route::delete('/course/{course}/delete', 'CourseController@delete')->name('delete-course');
    Route::post('/language/{user}', 'UserLanguageController@store')->name('store-language')->middleware(['auth', 'verified']);
    Route::put('/language/{language}/user/{id}', 'UserLanguageController@update')->name('update-user-language');
    Route::delete('/language/{id}', 'UserLanguageController@delete')->name('delete-user-language');
    Route::put('/preference/{preference}', 'PreferenceController@update')->name('update-preference');
    Route::post('/location/{user}', 'PreferenceController@storeLocation')->name('store-prefered-location')->middleware(['auth', 'verified']);
    Route::put('/location/{location}/user/{id}', 'PreferenceController@updateLocation')->name('update-user-location');
    Route::delete('/location/{id}', 'PreferenceController@deleteLocation')->name('delete-user-location');
    Route::get('/preferences', 'PreferenceController@showPreferences')->name('user-prefered-locations')->middleware(['auth', 'verified']);
    Route::post('/file/upload', 'ProfileController@uploadCV')->name('upload-cv')->middleware(['auth', 'verified']);
    Route::delete('/cv/{doctor}', 'ProfileController@deleteCV')->name('delete-user-cv')->middleware(['auth', 'verified']);
    Route::put('/share-profile/{user}', 'ProfileController@share')->name('share-profile')->middleware(['auth', 'verified']);
    Route::get('/rooms', 'RoomController@index')->name('user-rooms')->middleware(['auth', 'verified']);
    Route::get('/rooms/{room}', 'RoomController@show')->name('show-room')->middleware(['auth', 'verified']);
    Route::post('/message/{room}', 'RoomController@reply')->name('reply-room')->middleware(['auth', 'verified']);
});

Route::post('/send-message/{advertisement}', 'ContactController@store')->name('send-message');

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
    Route::resource('pages', 'PageController')->middleware(['auth', 'admin', 'verified']);
    Route::resource('mailinglists', 'MailinglistController')->middleware(['auth', 'admin', 'verified']);
    Route::resource('recipients', 'RecipientController')->middleware(['auth', 'admin', 'verified']);
    Route::resource('newsletters', 'NewsletterController')->middleware(['auth', 'admin', 'verified']);
    Route::get('/email-manager', [
        'uses' => 'EmailController@getIndex'
    ])->middleware(['auth', 'admin', 'verified'])->name('mailTracker_Index');
    Route::get('/seach', [
        'uses' => 'EmailController@postSearch'
    ])->middleware(['auth', 'admin', 'verified'])->name('mailTracker_Search');
    Route::get('/clear', [
        'uses' => 'EmailController@clearSearch'
    ])->middleware(['auth', 'admin', 'verified'])->name('mailTracker_ClearSearch');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('users', 'AdminController@index')->middleware(['auth', 'admin', 'verified'])->name('users.list');
    Route::post('block/{user}', 'AdminController@block')->middleware(['auth', 'admin', 'verified'])->name('users.block');
    Route::post('unblock/{user}', 'AdminController@unblock')->middleware(['auth', 'admin', 'verified'])->name('users.unblock');
});

Route::group(array('prefix' => 'blog'), function () {
    Route::get('/list', 'BlogController@index')->name('blog.index');
    Route::get('/list/{category}', 'BlogController@indexCategory')->name('blog.category');
    Route::get('/show/{slug}', 'BlogController@show')->name('blog.show');
    Route::get('/tag/{tagSlug}/{page?}', [
        'as' => 'postTag',
        'uses' => 'TagController@showPost'
    ]);

    Route::post('/comment-post', 'CommentController@store')->name('comment-post');
    Route::put('/comment/{comment}', 'CommentController@update')->name('update-comment');
    Route::delete('/comment/{comment}/delete', 'CommentController@delete')->name('delete-comment');
});

