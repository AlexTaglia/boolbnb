<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/index', 'ApartmentController@index')->name('index')->middleware('auth');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@index')->name('search');
Route::resource('apartment', 'ApartmentController');

Route::get('/message', 'MessageController@index');

Route::resource('messages', 'MessageController');

// braintree
Route::get('/payment/process/', 'PaymentsController@index')->name('payment.process');
// Route::get('/payment/{apartmentId}/process/{sponsorId}', 'PaymentsController@index')->name('payment.process');
Route::post('/payment/subscribe/{sponsorId}/{apartmentdId}', 'PaymentsController@subscribe')->name('payment.subscribe');
