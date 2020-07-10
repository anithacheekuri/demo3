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

Route::any('aa', 'HomeController@aa');

Route::any('form', 'HomeController@form');

Route::any('/forme', 'HomeController@formstore');

Auth::routes();

Route::any('verify','Verifycontroller@showverifyPage');



Route::any('resendotp','ResendController@resendotp')->name('resendotp');;
// verifyOTP
Route::any('verifyOTP','Verifycontroller@verifyOTP')->name('verifyOTP');

//Route::Post('checkingOTP','Verifycontroller@checkingOTP')->name('checkingOTP');

Route::group(['middleware' => 'Twofa'], function (){
   
  Route::get('/home', 'HomeController@index')->name('home');
 

});



Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AccountsController@resetPassword');

