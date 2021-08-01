<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes (Common Features)
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Signin, Signup, Forgot Password
Route::get('/common/signin', ['as'=>'signin.index', 'uses'=>'SigninController@index']);
Route::post('/common/signin', ['as'=>'signin.verify', 'uses'=>'SigninController@verify']);
Route::get('/common/signup', ['as'=>'signup.index', 'uses'=>'SignupController@index']);
Route::post('/common/signup', ['as'=>'signup.verify', 'uses'=>'SignupController@verify']);

Route::get('/common/forgotpass', ['as'=>'forgotpass.index', 'uses'=>'ForgotpassController@index']);
Route::post('/common/forgotpass', ['as'=>'forgotpass.verify', 'uses'=>'ForgotpassController@verify']);

Route::get('/common/forgotpass/confirm', ['as'=>'forgotpass.confirm', 'uses'=>'ForgotpassController@confirm']);
Route::post('/common/forgotpass/confirm', ['as'=>'forgotpass.confirm_verify', 'uses'=>'ForgotpassController@confirm_verify']);

//Admin
Route::group(['middleware'=>['sess','admin_type']], function(){
    Route::get('/common/admin/index', ['as'=>'admin.index', 'uses'=>'AdminDashboardController@index']);
    Route::get('/common/admin/profile', ['as'=>'admin.profile', 'uses'=>'AdminProfileController@index']);
    Route::get('/common/admin/leaverequests', ['as'=>'admin.leaverequests', 'uses'=>'AdminLeaverequestController@index']);
});