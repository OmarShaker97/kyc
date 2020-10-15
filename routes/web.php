<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sms/verifyphone', 'SMSVerificationController@verifyPhone')
    ->name('sms.verifyphone')
    ->middleware('hasPhoneNumber');

Route::put('/sms/verifyphone', 'SMSVerificationController@onClickVerify')->name('sms.onClickVerify');

Route::resource('/sms', 'SMSVerificationController');
