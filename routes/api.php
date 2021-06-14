<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login/{lang}/{v}', [ 'as' => 'login', 'uses' => 'AuthController@login'])->middleware('checkguest');
    Route::post('logout/{lang}/{v}', 'AuthController@logout');
    Route::post('refresh/{lang}/{v}', 'AuthController@refresh');
    Route::post('me/{lang}/{v}', 'AuthController@me');
    Route::post('register/{lang}/{v}' , [ 'as' => 'register', 'uses' => 'AuthController@register'])->middleware('checkguest');
});

Route::get('/invalid/{lang}/{v}', [ 'as' => 'invalid', 'uses' => 'AuthController@invalid']);


// users apis group
Route::group([
    'middleware' => 'api',
    'prefix' => 'user'
], function($router) {
    Route::get('profile/{lang}/{v}' , 'UserController@getprofile');
    Route::put('profile/{lang}/{v}' , 'UserController@updateprofile');
    Route::put('resetpassword/{lang}/{v}' , 'UserController@resetpassword');
    Route::put('resetforgettenpassword/{lang}/{v}' , 'UserController@resetforgettenpassword')->middleware('checkguest');
    Route::post('checkphoneexistance/{lang}/{v}' , 'UserController@checkphoneexistance')->middleware('checkguest');
    Route::get('notifications/{lang}/{v}' , 'UserController@notifications');

});

// send contact us message
Route::post('/contactus/{lang}/{v}' , 'ContactUsController@SendMessage')->middleware('checkguest');

// get app number
Route::get('/getappnumber/{lang}/{v}' , 'SettingController@getappnumber')->middleware('checkguest');

// get whats app number
Route::get('/getwhatsappnumber/{lang}/{v}' , 'SettingController@getwhatsapp')->middleware('checkguest');

// rates
// get rates 
Route::get('/rate/{order_id}/{lang}/{v}' , 'RateController@getrates')->middleware('checkguest');
// add rate
Route::post('/rate/{lang}/{v}' , 'RateController@addrate');
