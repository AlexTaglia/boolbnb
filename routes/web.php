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
Route::get('/', 'HomeController@index');

Route::get('/search', 'SearchController@index');
Route::resource('apartment', 'ApartmentController')->middleware('auth');

Route::get('/home/message', 'MessageController@index');

Route::resource('apartment.message', 'MessageController');

// braintree
Route::get('/payment/process/', 'PaymentsController@index')->name('payment.process');
// Route::get('/payment/{apartmentId}/process/{sponsorId}', 'PaymentsController@index')->name('payment.process');
Route::post('/payment/subscribe/{sponsorId}/{apartmentdId}', 'PaymentsController@subscribe')->name('payment.subscribe');
