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
    broadcast(new WebsocketDemoEvent('some data'));

    return view('welcome');
});

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
